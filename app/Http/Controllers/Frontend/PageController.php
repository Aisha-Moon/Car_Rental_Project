<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rental;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
   
        $query = Car::where('availability', 1);
    
        $carTypes = Car::select('car_type')->distinct()->pluck('car_type');
        $brands = Car::select('brand')->distinct()->pluck('brand');
    
        //filters
        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }
    
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
    
        if ($request->filled('price_max')) {
            $query->where('daily_rent_price', '<=', $request->price_max);
        }
    
      
        $data['cars'] = $query->get();
        $data['carTypes'] = $carTypes;
        $data['brands'] = $brands;
    
        return view('frontend.home.dashboard', $data);
    }
    
    public function car_details($id)
    {
        $data['car'] = Car::where('id', $id)->where('availability', 1)->firstOrFail();

        $data['unavailableDates'] = Rental::where('status', 'ongoing')->where('car_id', $data['car']->id)->get()->flatMap(function ($rental) {
            return $this->getDateRange($rental->start_date, $rental->end_date);
        })->unique()->values()->toArray();

        return view('frontend.home.car_details', $data);
    }

    private function getDateRange($start_date, $end_date)
    {
        $dates = [];
        $current = strtotime($start_date);
        $end = strtotime($end_date);

        while ($current <= $end) {
            $dates[] = date('Y-m-d', $current);
            $current = strtotime('+1 day', $current);
        }

        return $dates;
    }


    public function show(){
        return view('frontend.home.account');
    }

    public function about(){
        return view('frontend.home.about');
    }
    public function contact(){
        return view('frontend.home.contact');
    }
}
