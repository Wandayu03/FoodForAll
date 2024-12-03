<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template');
});

Route::get('/rent/for/sharing', function () {
    return view('rent');
});

Route::get('/about', function () {
    return view('about');
});