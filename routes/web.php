<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template');
});

Route::get('/rent/for/sharing', function () {
    return view('rent');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/donate', function () {
    return view('donate');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/support', function () {
    return view('support');
})->name('support');
