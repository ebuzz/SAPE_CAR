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

Route::get('test',function(){
	return "Hola";
});

Route::get('credits',function(){
	return "Hola";
});

Route::get('register',function(){
	return "Hola";
});

Route::get('results',function(){
	return "Hola";
});

Route::get('login','LoginController@showLogin');

Route::post('login','LoginController@doLogin');

Route::get('logout','LoginController@doLogout');

Route::get('forgot',function(){
	return "Hola";
});

//This routes cannot be accessed without log in first, all routes from tests must be included here
Route::group(array('before' => 'auth'), function()
{
	Route::get('test/scat',function(){
		return "Solo logeados " . Auth::user()->email;
	});

	Route::get('test/csai-12',function(){
		return "Solo logeados " . Auth::user()->email;
	});

	Route::get('test/burnout',function(){
		return "Solo logeados " . Auth::user()->email;
	});

	Route::get('test/iprd',function(){
		return "Solo logeados " . Auth::user()->email;
	});

	Route::get('test/iprd-combate',function(){
		return "Solo logeados " . Auth::user()->email;
	});

});

// Rutas AJAX
Route::get('test/profile/getcities/{idState}', 'ProfileController@getCities');
Route::get('test/profile/getsports/{idCity}', 'ProfileController@getSports');
Route::get('test/profile/getfields/{idSport}', 'ProfileController@getFields');