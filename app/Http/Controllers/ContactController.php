<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use App\Http\Common\SiteFeatures;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
        //session()->regenerate();
        Session::put('site_requirement', $site_requirement);
        $data['site_requirement'] = $site_requirement;
        return view('contact', $data);
        
    }
    
    public function submitContact()
    {
        $contact_details = Input::all();
        $rules = array(
            'name'    => 'required',
            'email'    => 'required|email',
            'mobile_number'    => 'required|size:10',
            'address'    => 'required',
            'state'    => 'required',
            'pincode'    => 'required|size:6',
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
        $password = Hash::make('asd@123');
        $user_type = 2;
        $mobile_number = $contact_details['mobile_number'];
        $address = $contact_details['address'];
        $state = $contact_details['state'];
        $pincode = $contact_details['pincode'];
        $country = $contact_details['country'];
        $site_requirements = $contact_details['site_requirements'];
        
//        $user = new User;
//        $user->name = $name;
//        $user->email = $email;
//        $user->password = $password;
//        $user->user_type = $user_type;
//        
//        if( !$user->save() )
//        {            
//            return 'user not saved';
//        }
//        
//        $user_id = User::where('name', $name)
//                ->where('email', $email)
//                ->where('password', $password)
//                ->where('user_type', $user_type)
//                ->get()[0]->id;
//        $profile = new Profile;
//        $profile->user_id = $user_id;
//        $profile->address = $address;
//        $profile->mobile_number = $mobile_number;
//        $profile->state = $state;
//        $profile->pincode = $pincode;
//        $profile->country = $country;
//        if( !$profile->save() ) 
//        {
//            return 'profile data not saved';
//        }
        
        $is_saved = ContactController::saveSiteRequirements($site_requirements);
        
        print_r ($is_saved);
        //echo $is_saved;
        
        
        //return 'passed';
    }
    
    private function saveSiteRequirements() {
        $site_requirement = Session::get('site_requirement');
        if (!$site_requirement)
        {
            return 'site requirements doesnot exist';
        }
        $is_new_site = isset($site_requirement['is_new_site']) 
                ? ContactController::getExactFeatureDetails("existing", $site_requirement['is_new_site'])
                : NULL;
        
        $main_website_features = isset($site_requirement['main_website_features']) 
                ? $site_requirement['main_website_features'] 
                : NULL;
        
        if ($main_website_features)
        {
            $main_features = ContactController::getSiteFeaturesOfArrayProp($main_website_features, "main-feature");
        }

        $ecommerce_payment = isset($site_requirement['ecommerce_payment']) 
                ? $site_requirement['ecommerce_payment'] 
                : NULL;
        
        
        if ($ecommerce_payment)
        {
            $ecommerce_payment_options = ContactController::getSiteFeaturesOfArrayProp($ecommerce_payment, 'ecommerce-payment');
        }

        $ecommerce_products_upload = isset($site_requirement['ecommerce_products_upload']) 
                ? ContactController::getExactFeatureDetails("ecommerce-upload-products", $site_requirement['ecommerce_products_upload'])
                : NULL;
        $ecommerce_products_quantity = isset($site_requirement['ecommerce_products_quantity']) 
                ? ContactController::getExactFeatureDetails("ecommerce-product-quantity", $site_requirement['ecommerce_products_quantity'])
                : NULL;
        $portfolio_features = isset($site_requirement['portfolio_features']) 
                ? ContactController::getExactFeatureDetails("portfolio", $site_requirement['portfolio_features'])
                : NULL;
        
        $blog = isset($site_requirement['blog_features']) 
                ? $site_requirement['blog_features'] 
                : NULL;
        if ($blog)
        {
            $blog_options = ContactController::getSiteFeaturesOfArrayProp($blog, 'blog');
        }
        
        $size = isset($site_requirement['size']) 
                ? ContactController::getExactFeatureDetails("size", $site_requirement['size'])
                : NULL;
        
        $public_site_features = isset($site_requirement['public_site_features']) 
                ? $site_requirement['public_site_features'] 
                : NULL;
        
        if ($public_site_features)
        {
            $blog_options = ContactController::getSiteFeaturesOfArrayProp($public_site_features, "public-site");
        }
        
        $graphics_features = isset($site_requirement['graphics_features']) 
                ? ContactController::getExactFeatureDetails("graphics", $site_requirement['graphics_features'])
                : NULL;
        
        $is_logo_required = isset($site_requirement['is_logo_required']) 
                ? $site_requirement['is_logo_required'] 
                : NULL;
        if ($is_logo_required)
        {
            $logo_options = ContactController::getSiteFeaturesOfArrayProp($is_logo_required, "logo");
        }
        
        $site_content = isset($site_requirement['site_content']) 
                ? ContactController::getExactFeatureDetails("site-content", $site_requirement['site_content'])
                : NULL;
        $time_frame = isset($site_requirement['time_frame']) 
                ? ContactController::getExactFeatureDetails("time-frame", $site_requirement['time_frame'])
                : NULL;
        
        return $main_features;        
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
    
    private function sendEmail() 
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
