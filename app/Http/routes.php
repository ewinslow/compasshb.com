<?php

/*
 * Route for songs.
 */
Route::resource('songs', 'SongsController', ['except' => ['destroy']]);

/*
 * Route for passages
 */
Route::resource('read', 'PassagesController', ['except' => ['destroy']]);

/*
 * Route for slides
 */
Route::resource('slides', 'SlidesController', ['except' => ['destroy', 'show', 'index']]);

/*
 * Route for fellowships
 */
Route::resource('fellowship', 'FellowshipsController', ['except' => ['destroy', 'show']]);

/*
 * Route for sermons
 */
Route::resource('sermons', 'SermonsController', ['except' => ['destroy']]);
Route::get('sermons/{sermons}/download', [
    'as' => 'sermons.download',
    'uses' => 'SermonsController@download',
]);

/*
 * Route for sermon series
 */
Route::resource('/series', 'SeriesController', ['except' => ['destroy']]);

/*
 * Route for blogs
 */
Route::resource('blog', 'BlogsController', ['except' => ['destroy']]);

/*
 * Route for videos
 */
Route::get('videos', [
    'as' => 'videos',
    'uses' => 'PagesController@videos',
]);

/*
 * Route for homepage
 */
Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home',
]);

/*
 * Route for photos
 */
Route::get('photos', [
    'as' => 'photos',
    'uses' => 'PagesController@photos',
]);

/*
 * Route for pray
 */
Route::get('pray', [
    'as' => 'pray',
    'uses' => 'PagesController@pray',
]);

/*
 * Routes for feeds
 */
Route::group(['prefix' => 'feed'], function () {
    Route::get('sermons',  ['as' => 'feed.sermons', 'uses' => 'FeedsController@sermons']);
    Route::get('sermons.json',  ['as' => 'feed.sermons.json', 'uses' => 'FeedsController@json']);
    Route::get('songs.xml', ['as' => 'feed.songs.xml', 'uses' => 'FeedsController@songs']);
});

/*
 * Routes for APIs
 */
Route::group(['prefix' => 'api/1.0'], function () {
    Route::get('getsermonlist.json', 'FeedsController@getsermonlist');
});

/*
 * Routes for static pages
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

/*
 * Routes for Youth ministry
 */
Route::get('youth', [
    'as' => 'youth',
    'uses' => 'PagesController@youth',
]);

/*
 * Routes for Sunday School
 *
 */
Route::group(['prefix' => 'sundayschool'], function () {

    Route::get('/', [
        'as' => 'sundayschool.index',
        'uses' => 'PagesController@sundayschool',
    ]);

    Route::get('series', [
        'as' => 'sundayschool.series',
        'uses' => 'PagesController@sundsyachoolseries',
    ]);

});

/*
 * Routes for college ministry
 *
 */
Route::get('college', [
    'as' => 'college',
    'uses' => 'PagesController@college',
]);

/*
 * Routes for landing pages
 */
Route::get('bunnyrun', ['as' => 'bunnyrun',
    'uses' => 'PagesController@bunnyrun',
]);

/*
 * Administration Pages
 */
Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [
    'as' => 'admin',
    'uses' => 'HomeController@index',
    ]);

    Route::get('songs', [
        'as' => 'admin.songs',
        'uses' => 'HomeController@songs',
    ]);

    Route::get('blog', [
        'as' => 'admin.blog',
        'uses' => 'HomeController@blog',
    ]);

    Route::get('sermons', [
        'as' => 'admin.sermons',
        'uses' => 'HomeController@sermons',
    ]);

    Route::get('read', [
        'as' => 'admin.read',
        'uses' => 'HomeController@read',
    ]);

    Route::get('fellowship', [
        'as' => 'admin.fellowship',
        'uses' => 'HomeController@fellowship',
    ]);

    Route::get('slides', [
        'as' => 'admin.slides',
        'uses' => 'HomeController@slides',
    ]);

    Route::get('series', [
        'as' => 'admin.series',
        'uses' => 'HomeController@series',
    ]);

    Route::get('sundayschool', [
        'as' => 'admin.sundayschool',
        'user' => 'HomeController@sundayschool',
    ]);

});

/*
 * Authentication
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
