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

Route::get('/', 'HomeController@index');

Route::resource('profile','ProfileController');

Route::resource('bookseat','BookSeatController');

Route::group(['middleware' => 'admin'], function () {
    Route::controller('upload', 'MovieUploadController');
});

Route::controller('/', 'ShowTimeController');
