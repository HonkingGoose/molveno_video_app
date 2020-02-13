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

// Admin routes
Route::prefix('admin')->group(function() {
     Route::get('/', function() {
        echo "Admin homepage";
     });

     Route::get('guest', 'GuestController@index')->name('guest.index');

     Route::get('video', 'VideoController@index')->name('video.index');
     Route::get('video/create', 'VideoController@create');

     Route::get('video/{video}', 'VideoController@show');
     Route::post('video/{video}', 'VideoController@store');

     Route::get('video/{video}/edit', 'VideoController@edit');
     Route::put('video/{video}/edit', 'VideoController@update');

});

// Guest routes
Route::get('/', function() {
    echo "Guest landing page";
    foreach (App\Video::all() as $video) {
        echo $video->title;
    }
});

