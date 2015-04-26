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

Route::get('/{loc}/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);

/* Admin */
Route::get('/{loc}/admin/{pageContent}', 'AdminController@getAdmin')->before('auth|admin');

Route::post('/{loc}/admin/reservations', 'AdminController@getUserReservations')->before('auth|admin');

Route::post('/{loc}/admin/users', 'AdminController@getUser')->before('auth|admin');

Route::post('/{loc}/admin/authors', 'AdminController@getAuthors')->before('auth|admin');

Route::post('/{loc}/admin/books', 'AdminController@getBooks')->before('auth|admin');

Route::post('/{loc}/admin/search/renting', 'AdminController@getRentedBooks')->before('auth|admin');

Route::get('/{loc}/user/block/{id}','UserController@blockUser')->before('auth|admin');

Route::get('/{loc}/user/activate/{id}','UserController@activateUser')->before('auth|admin');

// Route::get('/adduser','UserController@getAddUser')->before('auth|admin');

Route::post('/{loc}/adduser','UserController@postAddUser')->before('auth|admin');

Route::get('/{loc}/user/edit/{id}','UserController@getEditUser')->before('auth|admin');

Route::post('/{loc}/user/edit/{id}','UserController@postEditUser')->before('auth|admin');

Route::get('/{loc}/user/verify/{id}','UserController@verifyUser')->before('auth|admin');

// Route::get('/user/{id}','UserController@getShowUser')->before('auth|admin');

// Route::get('/reservations/','ReservationController@getIndex')->before('auth|admin');

Route::get('/{loc}/reservation/cancel/{id}','ReservationController@cancelReservation')->before('auth|admin');

Route::get('/{loc}/test','ReservationController@test');

Route::get('/{loc}/reservation/makeready/{id}','ReservationController@makeReadyReservation')->before('auth|admin');

Route::get('/{loc}/reservation/rentbook/{id}','ReservationController@rentBook')->before('auth|admin');

/* Basic pages */
Route::get('/{loc}/about', 'HomeController@getAbout');

Route::get('/{loc}/help', 'HomeController@getHelp');

Route::get('/{loc}/contact', 'HomeController@getContact');

Route::get('/{loc}/status', 'HomeController@getStatus');

Route::get('/{loc}/terms', 'HomeController@getTerms');

Route::get('/{loc}/confirm/{usr_number}', 'UserController@confirmUser');
/* User basic operations */
Route::get('/{loc}/register', 'UserController@getRegister');

Route::get('/{loc}/resend_password', 'UserController@getResetPassword')->before('guest');

Route::post('/{loc}/resend_password', 'UserController@postResetPassword');

Route::get('/{loc}/login', 'UserController@getLogin')->before('guest');

Route::get('/{loc}/logout', 'UserController@getLogout')->before('auth');

Route::controller('/{loc}/users', 'UserController');

/* Book search */
Route::get('/{loc}/search', 'SearchController@getSearch');

Route::post('/{loc}/search', 'SearchController@postAdvancedSearch');

Route::post('/{loc}/search/basic', 'SearchController@postBasicSearch');

Route::get('/{loc}/search/results', 'SearchController@getAdvancedSearch');

Route::get('/{loc}/search/basic/results', 'SearchController@getAdvancedSearch');

/* Book */
Route::get('/{loc}/book/{id}', 'BookController@getShowBookWithReservation')->before('guest');

Route::get('/{loc}/book/{id}', array('as'=>'book', 'uses'=> (Auth::check()) ? 'BookController@getShowBookWithReservation' : 'BookController@getShowBook'));

Route::post('/{loc}/book/{id}/reserve', array('as' => 'reserve',
                                        'uses' => 'ReservationController@postReserveBook'))->before('auth');

Route::post('/{loc}/book/{id}/resign', array('as' => 'resign',
                                       'uses' => 'ReservationController@postCancelBookReservation'))->before('auth');

Route::controller('/{loc}/book', 'BookController');

Route::get('/{loc}/author/{id}', 'WriterController@getShowWriter');

Route::controller('/{loc}/author', 'WriterController');

Route::get('/{loc}/language/{id}', 'LanguageController@getShowLanguage');

Route::controller('/{loc}/language', 'LanguageController');

Route::get('/{loc}/kind/{id}', 'KindController@getShowKind');

Route::controller('/{loc}/kind', 'KindController');

Route::get('/{loc}/rented/{id}/returnbook', 'RentalController@returnBook');

Route::get('/{loc}/addbook','BookController@getAddBookView');

Route::post('/{loc}/addbook','BookController@postBook');

Route::get('/{loc}/removebook/{id}','BookController@removeBook');

Route::get('/{loc}/editbook/{id}','BookController@getEditBookView');

Route::post('/{loc}/editbook/{id}', 'BookController@editBook');

/* Account */
Route::get('/{loc}/account/{pageContent}', 'AccountController@getAccount')->before('auth');

Route::post('/{loc}/changePass', 'AccountController@changePassword');

Route::post('/{loc}/account/{id}/{book_name}/prolongate', array('as' => 'prolongate',
									 'uses' => 'AccountController@prolongate'))->before('auth');
/* Fine */
Route::get('/{loc}/rented/{id}/addfine','FineController@showFine');

Route::post('/{loc}/addfine/{id}','FineController@addFine');

Route::get('/{loc}/removefine/{id}','FineController@deleteFine');

/* Author */
Route::get('/{loc}/addauthor','WriterController@getAddWriterView');

Route::post('/{loc}/addauthor','WriterController@postWriter');

Route::get('/{loc}/editauthor/{id}','WriterController@getEditWriterView');

Route::post('/{loc}/editauthor/{id}', 'WriterController@postEditWriter');

Route::get('/{loc}/removeauthor/{id}', 'WriterController@removeWritter');

/* Rented */
Route::get('/{loc}/rentedList/{page}/{isbn}', 'RentalController@getRentedBooks');

Route::post('/{loc}/searchRented', 'RentalController@getRestPage');

Route::get('/{loc}/rented/{id}/addfine','FineController@showFine');
