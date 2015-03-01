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
Route::get('{year}/{month}/{slug}', 'PagesController@singlepost')
	->where(['year' => '\d{4}', 'month' => '\d{2}']);

Route::get('{year}/{month}/{slug}/podcast/{video_id}.mp4', 'PagesController@podcast')
	->where(['year' => '\d{4}', 'month' => '\d{2}']);

Route::get('read', 'PagesController@read');

/**
 * Routes without controllers
 */

Route::get('pray', function() 
{  
	return view('pages.pray')->with('title', 'Pray'); 
});

Route::get('fellowship', function()
{
	return view('pages.fellowship')->with('title', 'Home Fellowship Groups');
});

Route::get('sermons', function()
{
	return view('pages.sermons')->with('title', 'Sermons');
});

Route::get('worship', function()
{
	return view('pages.worship')->with('title', 'Worship');
});

Route::get('who-we-are', function()
{
	return view('pages.whoweare')->with('title', 'Who We Are');
});

Route::get('eight-distinctives', function()
{
	return view('pages.eightdistinctives')->with('title', '8 Distinctives');
});

Route::get('give', function()
{
	return view('pages.give')->with('title', 'Give');
});

Route::get('ice-cream-evangelism', function()
{
	return view('pages.icecreamevangelism')->with('title', 'Ice Cream Evangelism');
});

Route::get('kids-ministry', function()
{
	return view('pages.kidsministry')->with('title', 'Kids Ministry');
});

Route::get('what-we-believe', function()
{
	return view('pages.whatwebelieve')->with('title', 'What We Believe');
});

Route::get('calendar', function()
{
	return view('pages.calendar')->with('title', 'Calendar');
});

Route::get('youth', function()
{
	return view('pages.youth')->with('title', 'The United');
});

Route::get('college', function()
{
	return view('pages.college')->with('title', 'The Underground');
});

/**
 * Landing Pages
 */
Route::get('bunnyrun', function()
{
	return view('pages.landing.bunnyrun')->with('title', 'The Bunny Run 5K');
});