<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ROUTE AUTH (tanpa cek.auth)
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.login.post');

    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('auth.register.post');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// ROUTE YANG HARUS LOGIN
Route::middleware(['handle.inertia', 'check.auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
});
