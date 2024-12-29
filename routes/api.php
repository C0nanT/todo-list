<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::post('/register', [UserController::class, 'register'])->name('api/register');
Route::post('/login', [UserController::class, 'login'])->name('api/login');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('api/todos.index');
    Route::post('/todos', [TodoController::class, 'store'])->name('api/todos.store');
    Route::get('/todos/{id}', [TodoController::class, 'show']);
    Route::put('/todos/{id}', [TodoController::class, 'update']);
    Route::delete('/todos/{id}', [TodoController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::post('/user', [UserController::class, 'store'])->name('api/user.store');
});