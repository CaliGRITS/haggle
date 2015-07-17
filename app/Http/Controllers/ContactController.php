<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use App\Requirement;
use Illuminate\Support\Facades\Mail;
use App\Http\Common\SiteFeatures;
use Illuminate\Support\Facades\Session;
use App\Http\Common\ValidatorAndErrorHandler;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function createContactDetails()
    {
        $site_requirement = Input::all();
        $rules = array(
            'is_new_site'    => 'required'
        );        
        $validator = Validator::make($site_requirement, $rules);
        if ($validator->fails())
        {
            return 'failed';
        }
        Session::put('site_requirement', $site_requirement);
        $data['site_requirement'] = $site_requirement;
        return view('contact', $data);
        
    }
    
    public function submitContact()
    {
        $validate_fields = new ValidatorAndErrorHandler;
        $contact_details = Input::all();
        $rules = array(
            'name'    => 'required',
            'email'    => 'required|email',
            'mobile_number'    => 'required',
            'address'    => 'required',
            'state'    => 'required',
            'pincode'    => 'required',
            'country'    => 'required'
        );
        $validator = Validator::make($contact_details, $rules);
        $data = [];
        
        if ($validator->fails())
        {
            $data['error'] = $validator->messages();
            return $data;
        }
        $name = $contact_details['name'];
        $email = $contact_details['email'];
        $password = bcrypt(rand());
        $user_type = 2;
        $mobile_number = $contact_details['mobile_number'];
        $address = $contact_details['address'];
        $state = $contact_details['state'];
        $pincode = $contact_details['pincode'];
        $country = $contact_details['country'];  
        
        $data['name'] = $name;
        $data['email'] = $email;
        $data['mobile_number'] = $mobile_number;
        $data['address'] = $address;
        $data['state'] = $state;
        $data['pincode'] = $pincode;
        $data['country'] = $country;
        
        
        $is_email_exist = $validate_fields->checkEmailExistOrNot($email);
        if ($is_email_exist['status'])
        {
            $data['error'] = ['email' => $is_email_exist['message']];
            return view('contact', $data);
        }
        
        $is_valid_mobile = $validate_fields->checkIsValidMobile($mobile_number);
        if ($is_valid_mobile['status'])
        {
            $data['error'] = ["mobile_number" => $is_valid_mobile['message']];
            return view('contact', $data);
        }
        
        
        $is_valid_pincode = $validate_fields->checkIsValidPincode($pincode);
        if ($is_valid_pincode['status'])
        {
            $data['error'] = ["pincode" => $is_valid_pincode['message']];
            //return view('contact', $data);
        }
        
        DB::beginTransaction();
        
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->user_type = $user_type;
        
        $is_user_saved = $user->save();
        
        $user_id = User::where('name', $name)
                ->where('email', $email)
                ->where('password', $password)
                ->where('user_type', $user_type)
                ->get()[0]->id;
        $profile = new Profile;
        $profile->user_id = $user_id;
        $profile->address = $address;
        $profile->mobile_number = $mobile_number;
        $profile->state = $state;
        $profile->pincode = $pincode;
        $profile->country = $country;
        
        Session::put('email', $email);
        Session::put('name', $name);
        Session::put('mobile_number', $mobile_number);
        Session::put('user_id', $user_id);
        
        $is_profile_saved = $profile->save();
        
        $is_requirement_saved = ContactController::saveAndMailSiteRequirements($user_id);
        if ( !$is_user_saved || !$is_profile_saved || !$is_requirement_saved)
        {
            DB::rollBack();
            $data['submission_unsuccessfull'] = "Sorry!! Please try again.";
        } else {
            DB::commit();
            $data['submission_successfull'] = "Submitted Successfully. Thanks for contacting us!";            
        }
        return view('message', $data);
    }
    
    
    
    private function saveAndMailSiteRequirements($user_id) {
        $site_requirement = Session::get('site_requirement');
        if (!$site_requirement)
        {
            return 'site requirements doesnot exist';
        }
        $is_new_site = isset($site_requirement['is_new_site']) 
                ? ContactController::getExactFeatureDetails("existing", $site_requirement['is_new_site'])
                : "";
        
        $main_website_features = isset($site_requirement['main_website_features']) 
                ? $site_requirement['main_website_features'] 
                : "";
        
        $main_features = [];
        if ($main_website_features)
        {
            $main_features = ContactController::getSiteFeaturesOfArrayProp($main_website_features, "main-feature");
        }

        $ecommerce_payment = isset($site_requirement['ecommerce_payment']) 
                ? $site_requirement['ecommerce_payment'] 
                : "";
        
        $ecommerce_payment_options = [];
        if ($ecommerce_payment)
        {
            $ecommerce_payment_options = ContactController::getSiteFeaturesOfArrayProp($ecommerce_payment, 'ecommerce-payment');
        }

        $ecommerce_products_upload = isset($site_requirement['ecommerce_products_upload']) 
                ? ContactController::getExactFeatureDetails("ecommerce-upload-products", $site_requirement['ecommerce_products_upload'])
                : "";
        $ecommerce_products_quantity = isset($site_requirement['ecommerce_products_quantity']) 
                ? ContactController::getExactFeatureDetails("ecommerce-product-quantity", $site_requirement['ecommerce_products_quantity'])
                : "";
        $portfolio_features = isset($site_requirement['portfolio_features']) 
                ? ContactController::getExactFeatureDetails("portfolio", $site_requirement['portfolio_features'])
                : "";
        
        $blog = isset($site_requirement['blog_features']) 
                ? $site_requirement['blog_features'] 
                : "";
        
        $blog_options = [];
        if ($blog)
        {
            $blog_options = ContactController::getSiteFeaturesOfArrayProp($blog, 'blog');
        }
        
        $size = isset($site_requirement['size']) 
                ? ContactController::getExactFeatureDetails("size", $site_requirement['size'])
                : "";
        
        $public_site_features = isset($site_requirement['public_site_features']) 
                ? $site_requirement['public_site_features'] 
                : "";
        
        $public_site_options = [];
        if ($public_site_features)
        {
            $public_site_options = ContactController::getSiteFeaturesOfArrayProp($public_site_features, "public-site");
        }
        
        $graphics_features = isset($site_requirement['graphics_features']) 
                ? ContactController::getExactFeatureDetails("graphics", $site_requirement['graphics_features'])
                : "";
        
        $is_logo_required = isset($site_requirement['is_logo_required']) 
                ? $site_requirement['is_logo_required'] 
                : "";
        
        $logo_options = [];
        if ($is_logo_required)
        {
            $logo_options = ContactController::getSiteFeaturesOfArrayProp($is_logo_required, "logo");
        }
        
        $site_content = isset($site_requirement['site_content']) 
                ? ContactController::getExactFeatureDetails("site-content", $site_requirement['site_content'])
                : "";
        $time_frame = isset($site_requirement['time_frame']) 
                ? ContactController::getExactFeatureDetails("time-frame", $site_requirement['time_frame'])
                : "";
        
        $test = ContactController::saveSiteRequirement($user_id, $is_new_site, $main_features, $ecommerce_payment_options, $ecommerce_products_upload,
                $ecommerce_products_quantity, $portfolio_features, $blog_options, $size, $public_site_options, $graphics_features, $logo_options, $site_content, $time_frame);
        
        return $test;
        
    }
    
    private function saveSiteRequirement($user_id, $is_new_site, $main_features, $ecommerce_payment_options, $ecommerce_products_upload,
                $ecommerce_products_quantity, $portfolio_features, $blog_options, $size, $public_site_options, $graphics_features, $logo_options, $site_content, $time_frame)
    {
        $requirement = new Requirement();
        $requirement->user_id = $user_id;
        $requirement->is_new_site = $is_new_site['description'];
        $main_features_options = [];
        foreach ($main_features as $main_feature) {
            array_push($main_features_options, $main_feature['value']);
        }
        $requirement->main_features = json_encode($main_features_options);
        $ecommerce_payment_features_options = [];
        foreach ($ecommerce_payment_options as $ecommerce_payment_option) {
            array_push($ecommerce_payment_features_options, $ecommerce_payment_option['description']);
        }
        $requirement->ecommerce_payment_options = json_encode($ecommerce_payment_features_options);
        
        $requirement->ecommerce_products_upload = ("" === $ecommerce_products_upload) ? "" : $ecommerce_products_upload['description'] ;
        $requirement->ecommerce_products_quantity = ("" === $ecommerce_products_quantity) ? "" : $ecommerce_products_quantity['description'];
        $requirement->portfolio_features = ("" === $portfolio_features) ? "" : $portfolio_features['description'];
        $blog_features_options = [];
        foreach ($blog_options as $blog_option) {
            array_push($blog_features_options, $blog_option['description']);
        }
        $requirement->blog_options = json_encode($blog_features_options);
        $requirement->size = ("" === $size) ? "" : $size['description'];
        $public_site_features_options = [];
        foreach ($public_site_options as $public_site_option) {
            array_push($public_site_features_options, $public_site_option['description']);
        }
        $requirement->public_site_options = json_encode($public_site_features_options);
        $requirement->graphics_features = ("" === $graphics_features) ? "" : $graphics_features['description'];
        $requirement->is_logo_required = (count($logo_options) > 0) ? $logo_options[0]['description'] : "";
        $requirement->site_content = ("" === $site_content) ? "" : $site_content['description'];
        $requirement->time_frame = ("" === $time_frame) ? "" : $time_frame['description'];
        $requirement->total = Session::get('amount');
        
        if (!$requirement->save())
        {
            return FALSE;
        }
        
        ContactController::sendContactEmail();
        return TRUE;
    }
    
    private function sendContactEmail()
    {
        Mail::send('mail-contact',
        array(
            'name' => Session::get('name'),
            'email' => Session::get('email'),
            'mobile_number' => Session::get('mobile_number'),
            'user_id' => Session::get('user_id')
        ), function($message)
        {
            $message->from(SENDER_EMAIL);
            $message->to(ADMIN_EMAIL, ADMIN_NAME)->subject('New site request');
        });
    }
    
    private function getSiteFeaturesOfArrayProp($feature_type, $user_requirement){
        $options = [];
        foreach ($feature_type as $value) {
            array_push($options, ContactController::getExactFeatureDetails($user_requirement, $value));
        }
        return $options;
    }
    
    private function getExactFeatureDetails($feature_type, $user_requirement)
    {
        $features = (new SiteFeatures())->getFeature($feature_type);
        foreach ($features['options'] as $value) 
        {
            if ($value['value'] == $user_requirement)
            {
                $selected_feature = array(
                    "heading" => $features['heading'],
                    "title" => $features['title'],
                    "description" => $value['description'],
                    "price" => $value['price'],
                    "value" => $value['value']
                );
            }                
        }
        return $selected_feature;
    }
}
