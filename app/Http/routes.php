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

Route::get('pray', 'PagesController@pray');

Route::get('fellowship', 'PagesController@fellowship');

Route::get('learn', 'PagesController@learn');

Route::get('serve', 'PagesController@serve');

/*
 * Otherwise, Static Page
 */
Route::get('who-we-are', 'PagesController@whoweare');

Route::get('eight-distinctives', 'PagesController@eightdistinctives');

Route::get('give', 'PagesController@give');

Route::get('ice-cream-evangelism', 'PagesController@icecreamevangelism');

Route::get('kids-ministry', 'PagesController@kidsministry');

Route::get('what-we-believe', 'PagesController@whatwebelieve');

Route::get('calendar', 'PagesController@calendar');

Route::get('youth', 'PagesController@youth');

Route::get('college', 'PagesController@college');