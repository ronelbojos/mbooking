<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('bookings', [BookingController::class, 'index']);
Route::post('bookings', [BookingController::class, 'store']);
Route::patch('bookings/{booking}', [BookingController::class, 'update']);
Route::delete('bookings/{booking}', [BookingController::class, 'destroy']);

