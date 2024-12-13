<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HostelLocationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/send_notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send_notification');


Route::resource('/suggestions', SuggestionController::class);

Route::resource('/payments', PaymentController::class);

Route::resource('/users', UserController::class);

Route::resource('/rooms', RoomController::class);


Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/updateProfile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile');

Route::get("payment-verification", [App\Http\Controllers\PaymentController::class, 'paymentVerification'])->name('payment-verification');

Route::get('/pay', [App\Http\Controllers\PaymentController::class, 'index'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('callback');;



// // returns the home page with all posts
Route::get('/locations', HostelLocationController::class .'@index')->name('locations.index');
// returns the form for adding a post
Route::get('/locations/create', HostelLocationController::class . '@create')->name('locations.create');
// adds a post to the database
Route::post('/locations', HostelLocationController::class .'@store')->name('locations.store');
// returns a page that shows a full post
Route::get('/locations/{location}', HostelLocationController::class .'@show')->name('locations.show');
// returns the form for editing a post
Route::get('/locations/{location}/edit', HostelLocationController::class .'@edit')->name('locations.edit');
// updates a post
Route::put('/locations/{location}', HostelLocationController::class .'@update')->name('locations.update');
// deletes a post
Route::delete('/locations/{location}', HostelLocationController::class .'@destroy')->name('locations.destroy');