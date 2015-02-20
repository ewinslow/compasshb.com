<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('app');
});

Route::get('who-we-are', function()
{
	return View::make('pages.who-we-are');
});

Route::get('eight-distinctives', function()
{
	return View::make('pages.eight-distinctives');
});

Route::get('give', function()
{
	return View::make('pages.give');
});

Route::get('ice-cream-evangelism', function()
{
	return View::make('pages.ice-cream-evangelism');
});

Route::get('kids-ministry', function()
{
	return View::make('pages.kids-ministry');
});

Route::get('what-we-believe', function()
{
	return View::make('pages.what-we-believe');
});

Route::get('calendar', function()
{
	return View::make('pages.calendar');
});

Route::get('youth', function()
{
	return View::make('pages.youth');
});

Route::get('college', function()
{
	return View::make('pages.college');
});

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
