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
define('APP_NAME','haggle');
define('ADMIN_EMAIL','amitsinhaee2013@gmail.com');
define('ADMIN_NAME','Admin');
define('SENDER_EMAIL','haggle.site@gmail.com');

Route::get('/home', 'IndexController@index');
Route::get('/', 'IndexController@index');
Route::get('/get/feature/{type}', 'IndexController@getFeature');
Route::get('/calculate', 'CalculatorController@calculate');
Route::get('/save/amount', 'CalculatorController@saveAmount');
Route::post('/submit/contact', 'ContactController@createContactDetails');
Route::post('/submit/details', 'ContactController@submitContact');

Route::get('/login', 'LoginController@index');
Route::get('/logout', 'LoginController@adminLogout');
Route::get('/show/clients', 'AdminController@index');
Route::get('/show/{id}', 'AdminController@show');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/test', 'ContactController@testAll');