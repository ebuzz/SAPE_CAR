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

Route::get('signup', 'ProfileController@showSignup');

Route::get('results','ResultsController@showResults');

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

	Route::get('userProfile', 'ProfileController@showProfile');
	Route::post('saveUserProfile/{id?}', 'ProfileController@saveUserProfile');
	Route::post('changePassword', 'ProfileController@changePassword');

	Route::get('test/profile/getcities/{idState}', 'ProfileController@getCities');
	Route::get('test/profile/getsports/{idCity}', 'ProfileController@getSports');
	Route::get('test/profile/getfields/{idSport}', 'ProfileController@getFields');
	Route::get('test/profile/getchildvalues/{idParentValue}', 'ProfileController@getChildValues');
	Route::post('test/profile/saveProfile', 'ProfileController@saveProfile');

});

// Rutas AJAX

Route::post('results/getResults', 'ResultsController@getResults');


Route::get('profile/getcities/{idState}', 'ProfileController@getCities');
Route::get('profile/getcities/{idState}', 'ProfileController@getCities');
Route::get('profile/getsports/{idCity}', 'ProfileController@getSports');
Route::get('profile/getfields/{idSport}', 'ProfileController@getFields');
Route::get('profile/getchildvalues/{idParentValue}', 'ProfileController@getChildValues');
Route::post('profile/saveProfile', 'ProfileController@saveProfile');