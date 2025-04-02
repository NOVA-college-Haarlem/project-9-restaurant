<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


use App\Http\Controllers\UserController;

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

// Shift Management Routes
Route::get('/shifts', [ShiftController::class, 'index'])->name('shifts.index');
Route::get('/shifts/create', [ShiftController::class, 'create'])->name('shifts.create');
Route::post('/shifts', [ShiftController::class, 'store'])->name('shifts.store');
Route::post('/shifts/{shift}/assign', [ShiftController::class, 'assign'])->name('shifts.assign');
Route::post('/shifts/{shift}/update-status', [ShiftController::class, 'updateStatus'])->name('shifts.update-status');

// Schedule Routes
Route::get('/schedule', [ShiftController::class, 'schedule'])->name('shifts.schedule');
Route::get('/schedule/{view}', [ShiftController::class, 'schedule'])->name('shifts.schedule.view');

// User Shift Routes
Route::get('/shifts/user/{user}', [ShiftController::class, 'shifts_user'])->name('shifts.user');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/afwezigheid-aanmaken', [AbsenceController::class, 'create'])->name('absences.create');
Route::post('/afwezigheid-opslaan', [AbsenceController::class, 'store'])->name('absences.store');
Route::get('/afwezigheden', [AbsenceController::class, 'index'])->name('absences.index');

// Feedback formulier - geen auth middleware meer
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Feedback overzicht
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback/{feedback}/response', [FeedbackController::class, 'storeResponse'])->name('feedback.response');
