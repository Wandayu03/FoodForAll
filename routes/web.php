<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/support', function () {
    return view('support');
})->name('support');
