<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
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
        
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->user_type = $user_type;
        
        if( !$user->save() )
        {            
            return 'user not saved';
        }
        
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
        if( !$profile->save() ) 
        {
            return 'error';
        }
        return 'passed';
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
