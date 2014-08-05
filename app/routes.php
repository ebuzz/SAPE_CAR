<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::get('test/{testName}', 'TestController@showTest');

Route::get('/test',function(){
	return "Hola";
});

Route::get('login','LoginController@showLogin');

Route::post('login','LoginController@doLogin');

Route::get('logout','LoginController@doLougout');