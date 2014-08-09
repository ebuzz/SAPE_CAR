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

Route::get('logout','LoginController@doLogout');

//This routes cannot be accessed without log in first, all routes from tests must be included here
Route::group(array('before' => 'auth'), function()
{
	Route::get('testexamplecar',function(){
		return "Solo logeados " . Auth::user()->correo;
	});
	Route::get('test1','LoginController@doLougout');
	Route::get('test1','LoginController@doLougout');
	Route::get('test1','LoginController@doLougout');

});