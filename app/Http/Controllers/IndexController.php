<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Common\SiteFeatures;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $siteFeatures;
    function __construct() {
        $this->siteFeatures = new SiteFeatures();
    }
    
    public function index()
    {   
        return view('index', $this->siteFeatures->getAllFeatures());
    }
    
    public function getFeature(Request $request)
    {
        if (!$request->route('type')){
            return 'error';
        }
        $type = $request->route('type');
        return $this->siteFeatures->getFeature($type);
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
}
