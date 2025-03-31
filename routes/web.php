<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/reserveren', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserveren', [ReservationController::class, 'store'])->name('reservations.store');
