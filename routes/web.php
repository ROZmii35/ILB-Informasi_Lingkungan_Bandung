<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/tourist-environment', function () {
    return view('tourist-environment');
})->name('tourist-environment');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])
    ->name('auth.logout.post')
    ->middleware('auth');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/garbage-reporting', function () {
        return view('garbage-reporting');
    })->name('garbage-reporting');
    
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
});

// Admin Routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('reports', ReportController::class)->except(['create', 'store']);
    Route::put('/reports/{report}/update-status', [ReportController::class, 'updateStatus'])->name('reports.update-status');
    
    // Profile routes
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
});