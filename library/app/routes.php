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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);

Route::get('/about', 'HomeController@getAbout');

Route::get('/help', 'HomeController@getHelp');

Route::get('/privacy', 'HomeController@getPrivacy');

Route::get('/status', 'HomeController@getStatus');

Route::get('/terms', 'HomeController@getTerms');

Route::get('/register', 'UserController@getRegister');

Route::get('/resend_password', 'UserController@getResetPassword')->before('guest');

Route::post('/resend_password', 'UserController@postResetPassword');

Route::get('/login', 'UserController@getLogin')->before('guest');

Route::get('/logout', 'UserController@getLogout')->before('auth');

Route::controller('users', 'UserController');

Route::get('/search', 'SearchController@getSearch');

Route::post('/search', 'SearchController@postAdvancedSearch');

Route::post('/search/basic', 'SearchController@postBasicSearch');


// For testing purposes
Route::get('/isAvailable/{id}', 'ReservationController@isAvailable');
Route::get('/rent', 'RentalController@getRent');
Route::post('/rent', 'RentalController@postRent');
// Route::post('/rent/{bid}/{uid}', 'RentalController@postRent');
// For testing purposes