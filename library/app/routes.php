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

Route::get('/resend_password', 'UserController@getResend_Password')->before('guest');

Route::post('resend_password', 'UserController@sendNewPassword');

Route::get('/login', 'UserController@getLogin')->before('guest');

Route::get('/logout', 'UserController@getLogout')->before('auth');

Route::controller('users', 'UserController');

Route::get('/search', 'SearchController@getSearch');

Route::post('/search', 'SearchController@postAdvancedSearch');