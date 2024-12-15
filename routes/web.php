<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\LoginControleer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ShareController;

// Route::get('/', function () {
//     return view('template');
// });

Route::get('/share-a-meal', function () {
    return view('share');
})->name('RentForSharing')->middleware('auth');
Route::post('/share-a-meal', [ShareController::class, 'store'])->name('share.create');

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
})->name('donate')->middleware('auth');
Route::post('/donate', [DonationController::class, 'store'])->name('donation.create');

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