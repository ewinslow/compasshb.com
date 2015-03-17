<?php

/*
 * Songs
 */
Route::resource('songs', 'SongsController', ['except' => ['destroy']]);

/*
 * Passages
 */
Route::resource('read', 'PassagesController', ['except' => ['destroy']]);

/*
 * Fellowships
 */
Route::resource('fellowship', 'FellowshipsController', ['except' => ['destroy', 'show']]);

/*
 * Sermons
 */
Route::resource('sermons', 'SermonsController', ['except' => ['destroy']]);

/*
 * Blogs
 */
Route::resource('blog', 'BlogsController', ['except' => ['destroy']]);

/*
 * Home Page
 */
Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home',
]);

Route::get('photos', [
    'as' => 'photos',
    'uses' => 'PagesController@photos',
]);

Route::get('pray', [
    'as' => 'pray',
    'uses' => 'PagesController@pray',
]);

/*
 * Feeds
 */
Route::group(['prefix' => 'feeds'], function () {
    Route::get('sermons.json', 'FeedsController@sermons');
    Route::get('songs.xml', 'FeedsController@songs');
});

/*
 * Routes without controllers
 */

Route::get('who-we-are', [
    'as' => 'who-we-are',
    'uses' => 'PagesController@whoweare',
]);

Route::get('eight-distinctives', [
    'as' => 'distinctives',
    'uses' => 'PagesController@eightdistinctives',
]);

Route::get('give', [
    'as' => 'give',
    'uses' => 'PagesController@give',
]);

Route::get('ice-cream-evangelism', [
    'as' => 'evangelism',
    'uses' => 'PagesController@icecreamevangelism',
]);

Route::get('kids', [
    'as' => 'kids',
    'uses' => 'PagesController@kids',
]);

Route::get('what-we-believe', [
    'as' => 'believe',
    'uses' => 'PagesController@whatwebelieve',
]);

Route::get('calendar', [
    'as' => 'calendar',
    'uses' => 'PagesController@calendar',
]);

Route::get('youth', [
    'as' => 'youth',
    'uses' => 'PagesController@youth',
]);

Route::get('college', [
    'as' => 'college',
    'uses' => 'PagesController@college',
]);

Route::get('sundayschool', [
    'as' => 'sundayschool',
    'uses' => 'PagesController@sundayschool',
]);

/*
 * Landing Pages
 */
Route::get('bunnyrun', ['as' => 'bunnyrun',
    'uses' => 'PagesController@bunnyrun',
]);

/*
 * Archives
 */
Route::get('videos', [
    'as' => 'videos',
    'uses' => 'PagesController@videos',
]);

/*
 * Administration Pages
 */
Route::get('admin', [
    'as' => 'admin',
    'uses' => 'HomeController@index',
]);

/*
 * Authentication
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
