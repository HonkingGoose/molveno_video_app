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

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('video', 'VideoController');
        Route::post('video/update', 'VideoController@update')->name('video.update');
        Route::get('guest', 'GuestController@index')->name('guest.index');
        Route::view('/', 'layout.admin');
    });
});


// Guest routes
Route::prefix('guest')->group(function () {
    Route::get('watch_video', 'GuestController@indexVideo');
    Route::get('watch_video/{video}', 'VideoController@show');
    Route::post('watch_video/{video}', 'GuestController@postRating');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
