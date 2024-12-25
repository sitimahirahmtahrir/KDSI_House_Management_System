<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Root route pointing to the welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // Profile Management
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // User Management (Admin Only)
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // House Management
    Route::resource('houses', HouseController::class);

    // Maintenance Requests
    Route::resource('maintenance', MaintenanceController::class);

    // Guest Management
    Route::prefix('guests')->group(function () {
        Route::resource('/', GuestController::class)->parameters(['' => 'guest']);
        Route::post('{id}/verify', [GuestController::class, 'verify'])->name('guests.verify');
    });
});

// Include auth routes
require_once __DIR__ . '/auth.php';
