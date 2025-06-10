<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', [AuthController::class, 'showLogin']);

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::get('/trips', [TripController::class, 'adminIndex'])
    ->middleware('auth')
    ->name('trips.index');
