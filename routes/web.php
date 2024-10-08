<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CustomerController;

// customer login, registration, and logout
Route::get('/login', [CustomerController::class, 'login'])->name('login'); 
Route::post('/login', [CustomerController::class, 'login_post']); 
Route::get('register', [CustomerController::class, 'register']); 
Route::post('register', [CustomerController::class, 'register_post']); 
Route::get('/logout', [CustomerController::class, 'logout']); 

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    
    Route::get('admin/dashboard', [CustomerController::class, 'admin_dashboard'])->middleware(AdminMiddleware::class);
    
    // Admin Routes
    Route::middleware([AdminMiddleware::class])->group(function () {
        
        // Car management routes for admin
        Route::get('admin/car/list', [CarController::class, 'car_list']); 
        Route::get('admin/car/add', [CarController::class, 'car_add']); 
        Route::post('admin/car/add', [CarController::class, 'addCar']); 
        Route::get('/admin/car/edit/{id}', [CarController::class, 'edit_page']); 
        Route::put('/admin/car/edit/{id}', [CarController::class, 'update']); 
        Route::get('/admin/car/delete/{id}', [CarController::class, 'delete']); 
        
        // Routes for managing rentals
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('rental', RentalController::class)->except(['show']);
        });
        
        // Additional rental management routes
        Route::controller(RentalController::class)->group(function () {
            Route::get('rental/ongoing/{id}', 'ongoing'); 
            Route::get('rental/cancelled/{id}', 'cancelled');
            Route::get('rental/completed/{id}', 'completed'); 
            Route::get('rental/pending/{id}', 'pending'); 
        });
        
        // Customer management routes for admin
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('customers', CustomerController::class); // Resourceful routes for customer management
        });
    });

    // Customer Routes
    // Route::middleware([UserMiddleware::class])->group(function () {
        Route::get('/bookings', [App\Http\Controllers\Frontend\RentalController::class, 'index'])->name('bookings.index');
        Route::put('/bookings/{id}/cancel', [App\Http\Controllers\Frontend\RentalController::class, 'cancel'])->name('bookings.cancel'); 
    });
// });

Route::get('/', [PageController::class, 'dashboard']); 
Route::get('car-details/{id}', [PageController::class, 'car_details'])->name('car.details'); 

// booking and managing rentals
Route::controller(App\Http\Controllers\Frontend\RentalController::class)->group(function () {
    Route::post('/add_booking/{carId}', 'bookCar')->name('add_booking');
    Route::put('/cancel-booking/{id}', 'cancel')->name('bookings.cancel'); 
});

// Car filtering
Route::get('/cars/filter', [App\Http\Controllers\Frontend\CarController::class, 'filter'])->name('cars.filter'); // Filter cars

// Routes for account management and static pages
Route::get('/account', [App\Http\Controllers\Frontend\PageController::class, 'show'])->middleware('auth'); 
Route::get('/about', [App\Http\Controllers\Frontend\PageController::class, 'about']); 
Route::get('/contact', [App\Http\Controllers\Frontend\PageController::class, 'contact']); 


