<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalDetailsToCustomer;
use App\Mail\RentalNotificationToAdmin;

class RentalController extends Controller
{
    public function bookCar(Request $request, $carId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to book a car.');
        }
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);
  
        $car = Car::find($carId);
        if (!$car) {
            return redirect()->back()->withErrors(['error' => 'Car does not exist.']);
        }
    
        $rental = Rental::create([
            'car_id' => $carId,
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $car->daily_rent_price * (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24)
        ]);
    
        $customerEmail = Auth::user()->email; 
        $customerName = Auth::user()->name; 
        
    
       // Send emails
       try {
           Mail::to($customerEmail)->send(new RentalDetailsToCustomer($rental));
            Mail::to('admin@gmail.com')->send(new RentalNotificationToAdmin($customerName, $rental));
       } catch (\Exception $e) {
           Log::error('Email sending failed: ' . $e->getMessage());
       }

    
    
        return redirect()->route('car.details', $carId)->with('success', 'Booking successful!');
    }
    

    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to see Rental Details.');
        }
    
        $user = Auth::user();
    
        $bookings = Rental::where('user_id', $user->id)->get();
    
        foreach ($bookings as $booking) {
            if ($booking->end_date < now() && $booking->status != 'completed') {
                $booking->status = 'completed';
                $booking->save(); 
            }
        }
    
        $currentBookings = Rental::where('user_id', $user->id)
            ->whereIn('status', ['ongoing', 'pending'])
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
