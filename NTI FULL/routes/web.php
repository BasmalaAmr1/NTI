<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [ArticleController::class, 'index'])->name('dashboard');

// Auth
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest');
Route::post('register', [RegisterController::class, 'register'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
});
