<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginControleer;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\TrackingController;
use App\Models\History;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginControleer::class, 'login']);
Route::get('/logout', [LoginControleer::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistForm'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/donate', function () {
    return view('donate');
})->name('donate')->middleware('auth');
Route::post('/donate', [DonationController::class, 'store'])->name('donation.create');

Route::get('/share-a-meal', function () {
    return view('share');
})->name('share')->middleware('auth');
Route::post('/share-a-meal', [ShareController::class, 'store'])->name('share.create');

Route::get('/payment', [DonationController::class, 'paymentForm'])->name('payment.create');

Route::get( '/payment',  [PaymentController::class, 'showForm'])->name('payment.show');
Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('payment.create');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/history/{type}', [HistoryController::class, 'getHistory'])->name('history')->middleware('auth');

Route::get('/tracking/{id}', [TrackingController::class, 'getTracking'])->name('tracking')->middleware('auth');


