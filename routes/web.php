<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;

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

