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

Route::get('signup', 'ProfileController@showSignup');
Route::get('login', 'LoginController@showLogin');
Route::post('login','LoginController@doLogin');

Route::get('forgot',function()
{
	return "Hola";
});

Route::get('credits',function()
{
	return "Hola";
});

//This routes cannot be accessed without log in first, all routes from tests must be included here
Route::group(array('before' => 'auth'), function()
{
    Route::get('logout','LoginController@doLogout');
    Route::get('results','ResultsController@showResults');
    
    Route::get('test/{testName}', 'TestController@showTest');
    Route::post('test/{testName}', 'TestController@doSearch');
    Route::post("sendTest/{testName}",'TestController@submitTest');

	Route::get('userProfile', 'ProfileController@showProfile');
	Route::get('users', 'UserController@showUsers');
	Route::post('resetPassword', 'UserController@resetPassword');
	Route::post('getUsers', 'UserController@getUsers');
	Route::post('changePassword', 'ProfileController@changePassword');

    // Rutas AJAX
	Route::get('test/profile/getcities/{idState}', 'ProfileController@getCities');
	Route::get('test/profile/getsports/{idCity}', 'ProfileController@getSports');
	Route::get('test/profile/getfields/{idSport}', 'ProfileController@getFields');
	Route::get('test/profile/getchildvalues/{idParentValue}', 'ProfileController@getChildValues');
	Route::post('test/profile/saveProfile', 'ProfileController@saveProfile');
    
    Route::post('results/getResults', 'ResultsController@getResults');
});

Route::get('profile/getcities/{idState}', 'ProfileController@getCities');
Route::get('profile/getsports/{idCity}', 'ProfileController@getSports');
Route::get('profile/getfields/{idSport}', 'ProfileController@getFields');
Route::get('profile/getchildvalues/{idParentValue}', 'ProfileController@getChildValues');

Route::post('profile/saveProfile', 'ProfileController@saveProfile');
Route::post('saveUserProfile/{id?}', 'ProfileController@saveUserProfile');