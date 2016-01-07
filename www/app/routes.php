<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@run');
Route::get('/tags/{tag}', 'HomeController@runTags');
Route::get('/slide', 'HomeController@runSlide');
Route::group(array('prefix' => 'api'), function() {
	Route::get('sources', 'WebServicesController@getSources');
	Route::get('tags', 'WebServicesController@getTags');
	Route::get('images', 'WebServicesController@getImages');
	Route::get('locations', 'WebServicesController@getLocations');
	Route::get('data', 'WebServicesController@getData');
	Route::get('array', 'WebServicesController@getSilde');
	Route::get('postdata', 'WebServicesController@postData');
	Route::get('insert','InstagramController@insertTb');
	Route::get('lastimageid', 'WebServicesController@getLastImageId');
	Route::get('hashtag', 'WebServicesController@hashtag');
});




Route::get('ice', function(){
	return Response::view('ice');
});

//Route::get('insert','InstagramController@insertTb');
Route::get('test','InstagramController@subStringUsername');
Route::get('test2','InstagramController@searchUsername');
Route::get('test3','InstagramController@testJson');

Route::get('ant', array('before' => 'auth', function(){
	echo 'My page';
}));

Route::get('/contact/c', function(){
	return View::make('contact')->with(array('tag' => 'contact'));
});

Route::get('/search/s', 'WebServicesController@searchData');
Route::post('/search/s', 'WebServicesController@searchData');

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {
	Route::get('index', 'AdminController@index');
	Route::get('manage', 'AdminController@manage');
	Route::get('/sendstatus/y', 'AdminController@updateStatusY');
	Route::get('/sendstatus/n', 'AdminController@updateStatusN');
});

Route::get('logout', array('uses' => 'HomeController@doLogout'));

