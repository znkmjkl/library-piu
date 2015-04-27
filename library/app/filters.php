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

function unset_uri_var($variable, $uri) {   
    $parseUri = parse_url($uri);
    $arrayUri = array();

	$newUri = $uri;

    if(isset($parseUri['query'])) {
	    parse_str($parseUri['query'], $arrayUri);
	    unset($arrayUri[$variable]);
	    $newUri = http_build_query($arrayUri);
	    $newUri = $parseUri['path'].'?'.$newUri;
	}
    return $newUri;
}

App::before(function($request)
{

	$lang = 'pl';
	$lang_uri = null;

	if (isset($_GET['loc'])) {
		$lang_uri = $_GET['loc'];
	}

	if(!Session::has('language'))
	{
	    Session::put('language', $lang);
	}

	if($lang_uri != null && $lang_uri !== Session::get('language'))
	{
	    Session::put('language', $lang_uri);
	}

	App::setLocale(Session::get('language'));

	if (isset($_GET['loc'])) {
		$url = Request::path();
		$url = unset_uri_var('loc', $url);

		return Redirect::to($url);
	}

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