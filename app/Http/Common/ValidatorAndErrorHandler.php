<?php

namespace App\Http\Common;

use App\User;

class ValidatorAndErrorHandler {
    
    public function checkIsValidPincode($pincode)
    {
        if (strlen($pincode) !== 6 || !is_numeric($pincode))
        {
            $data = array(
                "status" => TRUE,
                "message" => "Please enter a valid pincode"
            );
        }
        else 
        {
            $data = array(
                "status" => FALSE,
                "message" => ""
            );
            
        }
        return $data;
    }
    
    public function checkIsValidMobile($mobile)
    {
        if (strlen($mobile) !== 10 || !is_numeric($mobile))
        {
            $data = array(
                "status" => TRUE,
                "message" => "Please enter a valid mobile number"
            );
        }
        else 
        {
            $data = array(
                "status" => FALSE,
                "message" => ""
            );
            
        }
        return $data;
    }
    
    public function checkEmailExistOrNot($email)
    {
        $check_duplicate_or_not = User::where('email', $email)->get();

        if (count($check_duplicate_or_not) > 0)
        {
            $data = array(
                "status" => TRUE,
                "message" => "Email already exist. Please try with another email."
            );
        }
        else
        {
            $data = array(
                "status" => FALSE,
                "message" => ""
            );
        }
        return $data;
    }
}