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

/*
 * Temporary Redirects
 */
Route::get('/wp-admin', function()
{
	return redirect('/wp/wp-admin');
});

/*
 * Home Page
 */
Route::get('/', 'PagesController@home');

/*
 * Dynamic Pages
 * /2015/02/page-title-here
 *
 */
Route::get('{year}/{month}/{slug}', 'PagesController@singlepost')->where(['year' => '\d{4}', 'month' => '\d{2}']);

Route::get('read', 'PagesController@read');

/**
 * Routes without controllers
 */

Route::get('pray', function() 
{  
	return view('pages.pray'); 
});

Route::get('fellowship', function()
{
	return view('pages.fellowship');
});

Route::get('learn', function()
{
	return view('pages.learn');
});

Route::get('worship', function()
{
	return view('pages.worship');
});

Route::get('who-we-are', function()
{
	return view('pages.whoweare');
});

Route::get('eight-distinctives', function()
{
	return view('pages.eightdistinctives');
});

Route::get('give', function()
{
	return view('pages.give');
});

Route::get('ice-cream-evangelism', function()
{
	return view('pages.icecreamevangelism');
});

Route::get('kids-ministry', function()
{
	return view('pages.kidsministry');
});

Route::get('what-we-believe', function()
{
	return view('pages.whatwebelieve');
});

Route::get('calendar', function()
{
	return view('pages.calendar');
});

Route::get('youth', function()
{
	return view('pages.youth');
});

Route::get('college', function()
{
	return view('pages.college');
});