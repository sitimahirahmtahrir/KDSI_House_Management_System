<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PulapolController;
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

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

// User Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::post('/user/maintenance', [UserController::class, 'submitMaintenanceRequest']);
    Route::get('/user/maintenance/status', [UserController::class, 'viewMaintenanceRequests']);
    Route::post('/user/guest', [UserController::class, 'submitGuestDetails']);
    Route::get('/user/guest/status', [UserController::class, 'viewGuestRequests']);
    Route::get('/user/announcements', [UserController::class, 'viewAnnouncements']);
    Route::get('/user/house-status', [UserController::class, 'viewHouseStatus']);
});

// Profile Management
Route::middleware(['auth'])->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Management (Admin Only)
Route::middleware(['auth', 'role:admin'])->resource('users', UserController::class);

// House Management
Route::middleware(['auth'])->prefix('houses')->group(function () {
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
Route::middleware(['auth'])->prefix('maintenance')->group(function () {
    Route::get('/', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/new-requests', [MaintenanceController::class, 'newRequests'])->name('maintenance.newRequests');
    Route::get('/under-maintenance', [MaintenanceController::class, 'underMaintenance'])->name('maintenance.underMaintenance');
    Route::put('/update-status/{id}', [MaintenanceController::class, 'updateStatus'])->name('maintenance.updateStatus');
    Route::put('/notify/{id}', [MaintenanceController::class, 'notify'])->name('maintenance.notify');
});

// Guest Management
Route::middleware(['auth'])->prefix('guests')->group(function () {
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

// Pulapol Dashboard and Guest Verification
Route::middleware(['auth'])->prefix('pulapol')->group(function () {
    Route::get('/dashboard', [PulapolController::class, 'index'])->name('pulapol.dashboard');
    Route::post('/guest/verify/{id}', [PulapolController::class, 'verifyGuestVisit'])->name('pulapol.guest.verify');
});

// Announcement Management
Route::middleware(['auth'])->resource('announcements', AnnouncementController::class);

// Report Management
Route::middleware(['auth'])->resource('reports', ReportController::class);

// Logout Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
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
