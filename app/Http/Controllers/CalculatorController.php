<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Common\SiteFeatures;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    private $site_features;
    
    function __construct() {
        $this->site_features = new SiteFeatures();
    }
    
    // exposed to user for calcularion
    public function calculate(Request $request)
    {
        $total_price = 0;
        $choosed_options_from_url = (NULL !== ($request->input('query'))) ? $request->input('query') : NULL;
        if (isset($choosed_options_from_url)){
            $choosed_options[] = explode(',', $choosed_options_from_url);
            $all_features = $this->site_features->getAllFeatures();
            $total_price = CalculatorController::getTotalPrice($all_features, $choosed_options[0]);
        }
        return $total_price;
        
    }
    
    // get total price
    private function getTotalPrice($all_features, $choosed_options)
    {
        $total_price = 0;
        foreach ($all_features as $options) 
        {
            foreach ($choosed_options as $choosed_value) 
            {
                $price = CalculatorController::getPrice($options['options'], $choosed_value);
                $total_price = $total_price + $price;
            }
        }
        return $total_price;
    }
    
    // get particular price tag
    private function getPrice($options, $choosed_value)
    {
        foreach ($options as $value)
        {
            if ($choosed_value == $value['value']) {
                return $value['price'];
            }
        }
        return 0;
    }
    
}

