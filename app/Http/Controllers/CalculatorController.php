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
    
    public function calculate()
    {
        $features = $this->site_features->getAllFeatures();
        return 1;
    }
}
