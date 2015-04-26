<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	// if(isset($_GET['loc']) && $_GET['loc'] != App::getLocale()){
	// 	App::setLocale($_GET['loc']);
	// }

 //    Redirect::to($request);

$lang = 'pl';
$lang_uri = Request::segment(1);

// Set default session language if none is set
if(!Session::has('language'))
{
    Session::put('language', $lang);
}

// Route language path if needed
if($lang_uri !== 'en' && $lang_uri !== 'pl')
{

	//return Redirect::to('google.com');
    return Redirect::to($lang.'/'.($lang_uri ? Request::path() : ''));
}
// Set session language to uri
elseif($lang_uri !== Session::get('language'))
{
    Session::put('language', $lang_uri);
}

// Store the language switch links to the session
$pl2en = preg_replace('/pl/', 'en', Request::fullUrl(), 1);
$en2pl = preg_replace('/en/', 'pl', Request::fullUrl(), 1);
Session::put('pl2en', $pl2en);
Session::put('en2pl', $en2pl);
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('admin', function($route, $request)
{
    if ( ! Auth::user()->isAdmin()) {
        return App::abort(401, 'You are not authorized.');
    }
});