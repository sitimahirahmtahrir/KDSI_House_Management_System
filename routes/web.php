<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

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
    Route::get('/houses/vacant', [HouseController::class, 'vacant'])->name('houses.vacant');
    Route::get('/houses/occupied', [HouseController::class, 'occupied'])->name('houses.occupied');
    Route::get('/houses/under-maintenance', [HouseController::class, 'underMaintenance'])->name('houses.underMaintenance');

    // Maintenance Requests
    Route::get('/maintenance/pending', [MaintenanceController::class, 'pending'])->name('maintenance.pending');
    Route::get('/maintenance/in-progress', [MaintenanceController::class, 'inProgress'])->name('maintenance.inProgress');
    Route::get('/maintenance/completed', [MaintenanceController::class, 'completed'])->name('maintenance.completed');
    Route::resource('maintenance', MaintenanceController::class);

    // Guest Management
    Route::prefix('guests')->group(function () {
        Route::get('/', [GuestController::class, 'index'])->name('guests.index');
        Route::get('/create', [GuestController::class, 'create'])->name('guests.create');
        Route::post('/', [GuestController::class, 'store'])->name('guests.store');
        Route::get('/{guest}', [GuestController::class, 'show'])->name('guests.show');
        Route::get('/{guest}/edit', [GuestController::class, 'edit'])->name('guests.edit');
        Route::put('/{guest}', [GuestController::class, 'update'])->name('guests.update');
        Route::delete('/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy');
        Route::post('{guest}/verify', [GuestController::class, 'verify'])->name('guests.verify');
        Route::get('/today', [GuestController::class, 'visitsToday'])->name('guests.today');
    });

    // Logout Route
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// Authentication Routes
Auth::routes([
    'register' => true, // Allow user registration
    'reset' => true,    // Allow password reset
    'verify' => true,   // Enable email verification
]);

// Redirect /home to /dashboard
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home');
