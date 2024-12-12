<?php

use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// Route::get('/', function () {
//     return view('template');
// });

Route::get('/rent/for/sharing', function () {
    return view('rent');
})->name('RentForSharing');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

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
});

Route::get('/more1', function () {
    return view('more1');
});

Route::get('/more2', function () {
    return view('more2');
});

Route::get('/proof', function () {
    return view('proof');
});

Route::get('register', [RegisterController::class, 'showRegistForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);