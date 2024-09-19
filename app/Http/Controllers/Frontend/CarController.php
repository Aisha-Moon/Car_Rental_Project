<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // CarController.php

public function filter(Request $request)
{
    // Get filter inputs
    $carType = $request->input('car_type');
    $brand = $request->input('brand');
    $priceMax = $request->input('price_max');

    // Build the query
    $query = Car::query();

    if ($carType) {
        $query->where('car_type', $carType);
    }

    if ($brand) {
        $query->where('brand', $brand);
    }

    if ($priceMax) {
        $query->where('daily_rent_price', '<=', $priceMax);
    }

    // Get filtered cars
    $cars = $query->where('availability', 1)->get();

    // Pass the filtered cars and other necessary data back to the view
    return view('frontend.home.dashboard', [
        'cars' => $cars,
        'carTypes' => Car::distinct()->pluck('car_type'),
        'brands' => Car::distinct()->pluck('brand')
    ]);
}

}
