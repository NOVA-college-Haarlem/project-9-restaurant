<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuItemController;

use App\Http\Controllers\ShiftController;

Route::get('/', function () {
    return view('welcome');
});

// Reservation routes
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::resource('reservations', ReservationController::class);
Route::get('/reservations/calendar', [ReservationController::class, 'calendar'])->name('reservations.calendar');

// User routes
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// Customer (Klant) Routes
Route::get('/orders/menu', [OrderController::class, 'showMenu'])->name('orders.menu');
Route::post('/orders', [OrderController::class, 'placeOrder'])->name('orders.place');

// Restaurantmedewerker (Staff) Routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::patch('/orders/{order}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');

// Menu routes
Route::get('/menu/create', [MenuItemController::class, 'create'])->name('menu.create');
Route::post('/menu/store', [MenuItemController::class, 'store'])->name('menu.store');
Route::resource('menu', MenuItemController::class);

Route::resource('shifts', ShiftController::class)->only(['index', 'create', 'store']);
Route::post('/shifts/{shift}/update-status', [ShiftController::class, 'updateStatus'])->name('shifts.update-status');

Route::get('/shifts/{user}', [ShiftController::class, 'shifts_user'])->name('shifts.user');
    

