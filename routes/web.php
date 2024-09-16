<?php

use Illuminate\Support\Facades\Route;
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

