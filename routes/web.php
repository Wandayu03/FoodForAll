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