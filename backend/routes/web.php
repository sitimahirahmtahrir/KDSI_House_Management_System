<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// House Management Routes
Route::resource('houses', HouseController::class);

// Guest Management Routes
Route::resource('guests', GuestController::class);

// Maintenance Management Routes
Route::resource('maintenance', MaintenanceController::class);

// Report Management Routes
Route::resource('reports', ReportController::class);
