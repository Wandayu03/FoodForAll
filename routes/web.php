<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\LoginControleer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// Route::get('/', function () {
//     return view('template');
// });

Route::get('/rent/for/sharing', function () {
    return view('rent');
})->name('RentForSharing')->middleware('auth');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginControleer::class, 'login']);

Route::get('/logout', [LoginControleer::class, 'logout'])->name('logout');

Route::get('/donate', function () {
    return view('donate');
})->name('donate');

Route::post('/donate', [DonationController::class, 'store'])->name('donations.create');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/history', function () {
    return view('history');
})->middleware('auth');


//2 ini kalo bisa diapus ganti ke yg ada id nya
Route::get('/more1', function () {
    return view('more1');
})->middleware('auth');
Route::get('/more2', function () {
    return view('more2');
})->middleware('auth');



Route::get('/more/{id}')->middleware('auth');

Route::get('/proof', function () {
    return view('proof');
})->middleware('auth');

Route::get('register', [RegisterController::class, 'showRegistForm'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'register']);