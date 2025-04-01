<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShiftController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserveren', [ReservationController::class, 'store'])->name('reservations.store');
Route::resource('reservations', ReservationController::class);
Route::get('/calendar', [ReservationController::class, 'calendar'])->name('reservations.calendar');


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::resource('shifts', ShiftController::class)->only(['index', 'create', 'store']);
Route::post('/shifts/{shift}/update-status', [ShiftController::class, 'updateStatus'])->name('shifts.update-status');

Route::get('/shifts/{user}', [ShiftController::class, 'shifts_user'])->name('shifts.user');
    