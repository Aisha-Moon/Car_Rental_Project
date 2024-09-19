<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function bookCar(Request $request, $carId)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);


        $car = Car::find($carId);
        if (!$car) {
            return redirect()->back()->withErrors(['error' => 'Car does not exist.']);
        }

        Rental::create([
            'car_id' => $carId,
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $car->daily_rent_price * (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24)
        ]);

        return redirect()->route('car.details', $carId)->with('success', 'Booking successful!');
    }

    public function index()
    {
        $user = Auth::user();
        
        $currentBookings = Rental::where('user_id', $user->id)
            ->whereIn('status', ['ongoing']) 
            ->get();

        $pastBookings = Rental::where('user_id', $user->id)
            ->whereIn('status', ['completed', 'cancelled'])
            ->get();

        return view('frontend.rental.index', compact('currentBookings', 'pastBookings'));
    }
    public function cancel($id)
{
    $booking = Rental::where('id', $id)->where('user_id', Auth::user()->id)->first();

    if ($booking && $booking->start_date > now()) {
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('success', 'Booking canceled successfully.');
    }

    return redirect()->back()->with('error', 'Cannot cancel booking. Rental may have already started.');
}


}
