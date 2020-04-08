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
        Route::get('category', 'CategoryController@index')->name('category.index');
        Route::post('/category/{category}/update', 'CategoryController@update');
        Route::post('category/store', 'CategoryController@store')->name('category.store');
        Route::post('category/{category}/delete', 'CategoryController@delete');
        Route::get('guest/checkout', 'GuestController@showCheckout')->name('guest.checkout');
        Route::post('video/update', 'VideoController@update')->name('video.update');
        Route::post('guest/checkout', 'GuestController@tearDown');
        Route::get('guest/checkout/success', 'GuestController@showCheckoutSuccess')->name('guest.checkout.success');
        Route::get('guest', 'GuestController@index')->name('guest.index');
        Route::view('/', 'layout.admin');
        Route::view('/register', 'auth.register')->name('registerAccount');
        Route::get('/guest/room', 'GuestController@showRoomView')->name('guest.room.set');
        Route::post('/guest/room', 'GuestController@setRoomNumberCookie');
    });
});


// Guest
Route::view('/', 'landing_page.guest');
Route::prefix('guest')->group(function () {
    Route::get('watch_video', 'GuestController@indexVideo')->name('guest.videoIndex');
    Route::post('watch_video/search', 'GuestController@search')->name('guest.search');
    Route::get('watch_video/{video}', 'VideoController@show')->name('watchVideo');
    Route::post('watch_video/{video}', 'GuestController@postRating');
    Route::get('contact','ContactFormController@index');
    Route::post('contact','ContactFormController@send');
    Route::get('contact/sent','ContactFormController@sentSuccessfully');
    Route::post('watch_video/{video}/rate', 'GuestController@postRating');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('test-email', 'JobController@processQueue');
