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

Route::get('/', 'HomeController@index')->name('home');

Route::controller('showing','ShowTimeController');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile','ProfileController');
    Route::controller('bookseat','BookSeatController');
    Route::controller('setting', 'SettingController');
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('upload', 'MovieUploadController');
});
