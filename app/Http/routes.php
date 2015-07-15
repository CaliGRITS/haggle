<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'IndexController@index');
Route::get('/get/feature/{type}', 'IndexController@getFeature');
Route::get('/calculate', 'CalculatorController@calculate');
Route::post('/submit/contact', 'ContactController@createContactDetails');
Route::post('/submit/test', 'ContactController@submitContact');