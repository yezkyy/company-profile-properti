<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProyekController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Proyek Routes
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
    Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');
    // Edit and Update Routes
    Route::get('/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
    Route::put('/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');
    // Delete Routes
    Route::delete('/proyek/{id}', [ProyekController::class, 'destroy'])->name('proyek.destroy');

    // User Management Routes
    Route::resource('user', UserController::class)->except(['show']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Statistik Routes
Route::get('/admin/statistik-data', [App\Http\Controllers\Admin\DashboardController::class, 'getStatistikData']);
