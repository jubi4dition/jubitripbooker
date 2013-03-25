<?php

Route::controller('user');
Route::controller('login');
Route::controller('admin.users');
Route::controller('admin.trips');
Route::controller('admin');

Route::get('/', function()
{
	return Redirect::to('login');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('authAdmin', function()
{
	if (Auth::guest()) return Redirect::to('admin/login');
});

Route::filter('logged_in', function()
{
	if (Session::get('logged_in') == FALSE) return Redirect::to('login');
});
