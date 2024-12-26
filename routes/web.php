<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReportController;
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
    Route::prefix('houses')->group(function () {
        Route::get('/', [HouseController::class, 'index'])->name('houses.index');
        Route::get('/create', [HouseController::class, 'create'])->name('houses.create');
        Route::post('/', [HouseController::class, 'store'])->name('houses.store');
        Route::get('/vacant', [HouseController::class, 'vacant'])->name('houses.vacant');
        Route::post('/book/{id}', [HouseController::class, 'book'])->name('houses.book');
        Route::get('/occupied', [HouseController::class, 'occupied'])->name('houses.occupied');
        Route::get('/under-maintenance', [HouseController::class, 'underMaintenance'])->name('houses.underMaintenance');
        Route::get('/{house}/edit', [HouseController::class, 'edit'])->name('houses.edit');
        Route::put('/{house}', [HouseController::class, 'update'])->name('houses.update');
        Route::delete('/{house}', [HouseController::class, 'destroy'])->name('houses.destroy');
    });

    // Maintenance Management
    Route::prefix('maintenance')->group(function () {
        Route::get('/', [MaintenanceController::class, 'index'])->name('maintenance.index');
        Route::get('/new-requests', [MaintenanceController::class, 'newRequests'])->name('maintenance.newRequests');
        Route::get('/under-maintenance', [MaintenanceController::class, 'underMaintenance'])->name('maintenance.underMaintenance');
        Route::put('/update-status/{id}', [MaintenanceController::class, 'updateStatus'])->name('maintenance.updateStatus');
        Route::put('/notify/{id}', [MaintenanceController::class, 'notify'])->name('maintenance.notify');
    });

    // Guest Management
    Route::prefix('guests')->group(function () {
        Route::get('/', [GuestController::class, 'index'])->name('guests.index');
        Route::get('/create', [GuestController::class, 'create'])->name('guests.create');
        Route::post('/', [GuestController::class, 'store'])->name('guests.store');
        Route::get('/{guest}', [GuestController::class, 'show'])->name('guests.show');
        Route::get('/{guest}/edit', [GuestController::class, 'edit'])->name('guests.edit');
        Route::put('/{guest}', [GuestController::class, 'update'])->name('guests.update');
        Route::delete('/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy');
        Route::patch('/{guest}/verify', [GuestController::class, 'verify'])->name('guests.verify');
        Route::get('/today', [GuestController::class, 'visitsToday'])->name('guests.visits.today');
    });

    // Announcement Management
    Route::resource('announcements', AnnouncementController::class);

    // Report Management
    Route::resource('reports', ReportController::class);

    // Logout Routes
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
            ->name('logout')
            ->middleware('auth');

    Route::get('/logout', function () {
        return redirect('/')->with('success', 'You have been logged out successfully.');
    })->name('logout.redirect');
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
