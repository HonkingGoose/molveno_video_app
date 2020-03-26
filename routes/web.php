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


// Guest routes
Route::prefix('guest')->group(function () {
    Route::get('watch_video', 'GuestController@indexVideo');
    Route::get('watch_video/{video}', 'VideoController@show')->name('watchVideo');
    Route::post('watch_video/{video}/rate', 'GuestController@postRating');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
