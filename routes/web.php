<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CustomerController;

Route::get('/login', [CustomerController::class, 'login']);
Route::post('/login', [CustomerController::class, 'login_post']);
Route::get('register', [CustomerController::class, 'register']);
Route::post('register', [CustomerController::class, 'register_post']);
Route::get('/', [PageController::class, 'dashboard']);



Route::get('admin/dashboard', [CustomerController::class, 'admin_dashboard']);
Route::get('admin/car/list', [CarController::class, 'car_list']);
Route::get('admin/car/add', [CarController::class, 'car_add']);
Route::post('admin/car/add', [CarController::class, 'addCar']);
Route::get('/admin/car/edit/{id}', [CarController::class, 'edit_page']);
Route::put('/admin/car/edit/{id}', [CarController::class, 'update']);
Route::get('/admin/car/delete/{id}', [CarController::class, 'delete']);


Route::prefix('admin')->name('admin.')->group(function () {
     Route::resource('rental', RentalController::class)->except(['show']);
 });
 
 Route::get('rental/ongoing/{id}', [RentalController::class, 'ongoing']);
 Route::get('rental/cancelled/{id}', [RentalController::class, 'cancelled']);
 Route::get('rental/completed/{id}', [RentalController::class, 'completed']);



 