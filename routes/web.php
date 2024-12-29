<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Contracts\View\View;

Route::get('/', function (): View {
    return view('login');
})->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', function (): View {
    return view('register');
})->name('register');

Route::get('/users', function (): View {
    return view('users');
})->name('users');