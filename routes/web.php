<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest routes
Route::get('/guest', 'GuestController@index')->name('guest.index');


// Video routes
Route::get('/video', 'VideoController@index');
Route::get('/video/{video}', 'VideoController@show');

Route::post('/video/{video}', 'VideoController@store');
