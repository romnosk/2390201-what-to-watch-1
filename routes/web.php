<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Проверка локали
Route::get('/test', fn() => __('auth.failed'));
