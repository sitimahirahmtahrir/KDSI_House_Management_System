<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// House Management Routes
Route::middleware('auth')->group(function () {
    Route::resource('houses', HouseController::class);
});

// Maintenance Management Routes
Route::middleware('auth')->group(function () {
    Route::resource('maintenance', MaintenanceController::class);
});

// Guest Management Routes
Route::middleware('auth')->group(function () {
    Route::resource('guests', GuestController::class);
});

// Report Generation Routes
Route::middleware('auth')->group(function () {
    Route::get('/reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');
});
