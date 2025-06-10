<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;

// get all trips
Route::get('/trips', [TripController::class, 'index']);

// getting all bookings
Route::get('/bookings', [BookingController::class, 'index']); 

// creating a new booking
Route::post('/bookings', [BookingController::class, 'store']); 
