<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/users', function () {
    return view('users');
})->name('users');