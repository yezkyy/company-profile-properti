<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Statistik Routes
Route::get('/admin/statistik-data', [App\Http\Controllers\Admin\DashboardController::class, 'getStatistikData']);
