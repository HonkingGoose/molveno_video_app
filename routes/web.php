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

Route::resource('video', 'VideoController');


// Route::prefix('admin')->group(function() {
//      Route::get('/', function() {
//        return view('layout.admin');
//      });

//      Route::get('guest', 'GuestController@index')->name('guest.index');
//      Route::get('video/{video}', 'VideoController@show')->name('admin_video.show');
//      Route::get('video', 'VideoController@index')->name('admin_video.index');


//      Route::get('video/create', 'VideoController@create')->name('admin_video.create');
//      Route::post('video/{video}', 'VideoController@store');

//      Route::get('/video/{video}/delete', 'VideoController@delete')->name('admin_video.delete');

//      Route::get('video/{video}/edit', 'VideoController@edit')->name('admin_video.edit');
//      Route::put('video/{video}/edit', 'VideoController@update');

// });



// Guest routes
Route::get('/', function() {
    echo "Guest landing page";
    foreach (App\Video::all() as $video) {
        echo $video->title;
    }
});

Route::get('watch_video/{video}', 'VideoController@show');
