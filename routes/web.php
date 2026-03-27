<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes (Guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register.post');
});

// Protected Routes (Auth only)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',    [AuthController::class, 'logout'])->name('logout');
    Route::post('/deposit',   [TransactionController::class, 'deposit'])->name('deposit');
    Route::post('/withdraw',  [TransactionController::class, 'withdraw'])->name('withdraw');
});