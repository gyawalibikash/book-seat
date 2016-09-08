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

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile','ProfileController');
    Route::controller('bookseat','BookSeatController');
    Route::controller('setting', 'SettingController');
});
Route::get('/', 'HomeController@index')->name('home');
Route::controller('showing','CinehallController');


Route::group(['middleware' => 'admin'], function () {
    Route::resource('upload', 'MovieUploadController');
    Route::resource('releasingsoon', 'ReleasingSoonController');
});

Route::controller('/', 'ShowTimeController');

//Route::get('/coming_soon/{id}',function(){
//	return view('coming_soon.index');
//})->name('coming_soon');

