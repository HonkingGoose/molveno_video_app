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
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('layout.admin');
    });

    Route::resource('video', 'VideoController');
    Route::post('video/update', 'VideoController@update')->name('video.update');
    Route::get('guest', 'GuestController@index')->name('guest.index');
    Route::view('/', 'admin_video.central_page');
});



// Guest routes
Route::get('/', function () {
    echo "Guest landing page";
    foreach (App\Video::all() as $video) {
        echo $video->title;
    }
});

Route::get('watch_video/{video}', 'VideoController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
