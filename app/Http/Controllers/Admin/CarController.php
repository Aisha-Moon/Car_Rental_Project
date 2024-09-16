<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function car_list(){

        return view('admin.cars.list');
    }
    public function car_add(){

        return view('admin.cars.add');
    }
}
