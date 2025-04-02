<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\KitchenOrderController;
use App\Http\Controllers\DeliveryController;


use App\Http\Controllers\OrderController;

use App\Http\Controllers\ShiftController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Route;


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




Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// Route::resource('waitlists', WaitlistController::class);
 // Toon wachtlijst??
Route::get('/waitlist/create', [WaitlistController::class, 'create'])->name('waitlist.create'); // Toon formulier om klant toe te voegen aan wachtlijst
Route::post('/waitlist/store', [WaitlistController::class, 'store'])->name('waitlist.store'); // Voeg klant toe aan wachtlijst
Route::get('/waitlist/{id}/edit', [WaitlistController::class, 'edit'])->name('waitlist.edit'); // Toon formulier om klant te bewerken
Route::put('/waitlist/{id}', [WaitlistController::class, 'update'])->name('waitlist.update'); // Werk klantgegevens bij
Route::delete('/waitlist/{id}', [WaitlistController::class, 'destroy'])->name('waitlist.destroy'); // Verwijder klant van wachtlijst
Route::get('/waitlist', [WaitlistController::class, 'index'])->name('waitlist.index'); // Toon wachtlijst


Route::post('/waitlist', [WaitlistController::class, 'store'])->name('waitlist.store'); // Voeg klant toe aan wachtlijst
Route::delete('/waitlist/{id}', [WaitlistController::class, 'destroy'])->name('waitlist.destroy'); // Verwijder klant van wachtlijst
Route::post('/waitlist/{id}/notify', [WaitlistController::class, 'notify'])->name('waitlist.notify'); // Notificeer klant dat tafel klaar is
// Klanten kunnen zichzelf toevoegen aan de wachtlijst
Route::get('/waitlist/join', [WaitlistController::class, 'showJoinForm'])->name('waitlist.join-form'); // Toon het formulier

Route::post('/waitlist/join', [WaitlistController::class, 'join'])->name('waitlist.join');

// Klanten kunnen hun wachtrijpositie bekijken
Route::get('/waitlist/status/{user_id}', [WaitlistController::class, 'status'])->name('waitlist.status');

// Klanten kunnen zichzelf verwijderen
Route::post('/waitlist/leave', [WaitlistController::class, 'leave'])->name('waitlist.leave');





// Route voor het tonen van alle menu-items
Route::get('/menu-items', [MenuItemController::class, 'index'])->name('menu-items.index');
Route::get('/menu-display', [MenuItemController::class, 'display'])->name('menu-items.display');


// Route voor het toevoegen van een nieuw menu-item
Route::get('/menu-items/create', [MenuItemController::class, 'create'])->name('menu-items.create');
Route::post('/menu-items', [MenuItemController::class, 'store'])->name('menu-items.store');

// Route voor het bewerken van een menu-item
Route::get('/menu-items/{id}/edit', [MenuItemController::class, 'edit'])->name('menu-items.edit');
Route::put('/menu-items/{id}', [MenuItemController::class, 'update'])->name('menu-items.update');

// Route voor het verwijderen van een menu-item
Route::delete('/menu-items/{id}', [MenuItemController::class, 'destroy'])->name('menu-items.destroy');
// Route voor het filteren van menu-items
Route::get('/menu-items/filter', [MenuItemController::class, 'filterForm'])->name('menu-items.filterForm');
Route::get('/menu-items/filter-results', [MenuItemController::class, 'filter'])->name('menu-items.filter');

// Route voor het bekijken van de details van een menu-item
Route::get('/menu-items/{id}', [MenuItemController::class, 'show'])->name('menu-items.show');









Route::resource('menu', MenuItemController::class);
Route::resource('nutrition', NutritionController::class);
Route::resource('kitchen-orders', KitchenOrderController::class);
Route::resource('deliveries', DeliveryController::class);

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

// Shift routes
Route::resource('shifts', ShiftController::class)->only(['index', 'create', 'store']);
Route::post('/shifts/{shift}/update-status', [ShiftController::class, 'updateStatus'])->name('shifts.update-status');
Route::get('/shifts/{user}', [ShiftController::class, 'shifts_user'])->name('shifts.user');

// Table routes
Route::resource('tables', TableController::class);

// Loyalty Program routes
Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty.index');
Route::post('/loyalty/earn', [LoyaltyController::class, 'earnPoints'])->name('loyalty.earn');
Route::post('/loyalty/check', [LoyaltyController::class, 'checkPoints'])->name('loyalty.check');
Route::post('/loyalty/redeem', [LoyaltyController::class, 'redeemPoints'])->name('loyalty.redeem');

// Reward routes
Route::resource('rewards', RewardController::class);

use App\Http\Controllers\PaymentController;

Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/payment/submit', [PaymentController::class, 'processPayment'])->name('payment.submit');
Route::post('/payment/split', [PaymentController::class, 'splitBill'])->name('payment.split');
Route::post('/payment/tip', [PaymentController::class, 'addTip'])->name('payment.tip');
