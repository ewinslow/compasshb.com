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


// Static Pages
Route::get('who-we-are', 'PagesController@whoweare');

Route::get('eight-distinctives', 'PagesController@eightdistinctives');

Route::get('give', 'PagesController@give');

Route::get('ice-cream-evangelism', 'PagesController@icecreamevangelism');

Route::get('kids-ministry', 'PagesController@kidsministry');

Route::get('what-we-believe', 'PagesController@whatwebelieve');

Route::get('calendar', 'PagesController@calendar');

Route::get('youth', 'PagesController@youth');

Route::get('college', 'PagesController@college');


// Dynamic Pages
Route::get('{year}/{month}/{slug}', 'PostsController@content')->where(['year' => '\d{4}', 'month' => '\d{2}']);

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
