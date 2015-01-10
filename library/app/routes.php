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

/* Admin */
Route::get('/admin/{pageContent}', 'AdminController@getAdmin')->before('auth|admin');

Route::post('/admin/search/reservations', 'AdminController@getUserReservations')->before('auth|admin');

Route::post('/admin/search/user', 'AdminController@getUser')->before('auth|admin');

Route::get('/user/block/{id}','UserController@blockUser')->before('auth|admin');

Route::get('/user/activate/{id}','UserController@activateUser')->before('auth|admin');

// Route::get('/adduser','UserController@getAddUser')->before('auth|admin');

Route::post('/adduser','UserController@postAddUser')->before('auth|admin');

Route::get('/user/edit/{id}','UserController@getEditUser')->before('auth|admin');

Route::post('/user/edit/{id}','UserController@postEditUser')->before('auth|admin');

Route::get('/user/verify/{id}','UserController@verifyUser')->before('auth|admin');

// Route::get('/user/{id}','UserController@getShowUser')->before('auth|admin');

// Route::get('/reservations/','ReservationController@getIndex')->before('auth|admin');

Route::get('/reservation/cancel/{id}','ReservationController@cancelReservation')->before('auth|admin');

Route::get('/test','ReservationController@test');

Route::get('/reservation/makeready/{id}','ReservationController@makeReadyReservation')->before('auth|admin');

Route::get('/reservation/rentbook/{id}','ReservationController@rentBook')->before('auth|admin');

/* Basic pages */
Route::get('/about', 'HomeController@getAbout');

Route::get('/help', 'HomeController@getHelp');

Route::get('/contact', 'HomeController@getContact');

Route::get('/status', 'HomeController@getStatus');

Route::get('/terms', 'HomeController@getTerms');

/* User basic operations */
Route::get('/register', 'UserController@getRegister');

Route::get('/resend_password', 'UserController@getResetPassword')->before('guest');

Route::post('/resend_password', 'UserController@postResetPassword');

Route::get('/login', 'UserController@getLogin')->before('guest');

Route::get('/logout', 'UserController@getLogout')->before('auth');

Route::controller('/users', 'UserController');

/* Book search */
Route::get('/search', 'SearchController@getSearch');

Route::post('/search', 'SearchController@postAdvancedSearch');

Route::post('/search/basic', 'SearchController@postBasicSearch');

/* Book */
Route::get('/book/{id}', 'BookController@getShowBookWithReservation')->before('guest');

Route::get('/book/{id}', array('as'=>'book', 'uses'=> (Auth::check()) ? 'BookController@getShowBookWithReservation' : 'BookController@getShowBook'));

Route::post('/book/{id}/reserve', array('as' => 'reserve',
                                        'uses' => 'ReservationController@postReserveBook'))->before('auth');

Route::post('/book/{id}/resign', array('as' => 'resign',
                                       'uses' => 'ReservationController@postCancelBookReservation'))->before('auth');

Route::controller('/book', 'BookController');

Route::get('/author/{id}', 'WriterController@getShowWriter');

Route::controller('/author', 'WriterController');

Route::get('/language/{id}', 'LanguageController@getShowLanguage');

Route::controller('/language', 'LanguageController');

Route::get('/kind/{id}', 'KindController@getShowKind');

Route::controller('/kind', 'KindController');

Route::get('/rented/{id}/returnbook', 'RentalController@returnBook');

Route::get('/addbook','BookController@getAddBookView');

Route::post('/addbook','BookController@postBook');

Route::get('/removebook/{id}','BookController@removeBook');

Route::get('/editbook/{id}','BookController@getEditBookView');

Route::post('/editbook/{id}', 'BookController@editBook');

/* Account */
Route::get('/account', 'AccountController@getAccount')->before('auth');

Route::post('/changePass', 'AccountController@changePassword');

Route::post('/account/{id}/{book_name}/prolongate', array('as' => 'prolongate',
									 'uses' => 'AccountController@prolongate'))->before('auth');
/* Fine */
Route::get('/rented/{id}/addfine','FineController@showFine');

Route::post('/addfine/{id}','FineController@addFine');

Route::get('/removefine/{id}','FineController@deleteFine');

/* Author */
Route::get('/addauthor','WriterController@getAddWriterView');

Route::post('/addauthor','WriterController@postWriter');

Route::get('/editauthor/{id}','WriterController@getEditWriterView');

Route::post('/editauthor/{id}', 'WriterController@postEditWriter');

/* Rented */
Route::get('/rentedList/{page}/{isbn}', 'RentalController@getRentedBooks');

Route::post('/searchRented', 'RentalController@getRestPage');

Route::get('/rented/{id}/addfine','FineController@showFine');
