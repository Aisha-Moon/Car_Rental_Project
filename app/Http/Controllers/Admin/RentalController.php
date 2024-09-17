<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RentalController extends Controller
{
    public function index()
    {
        $data['header_title'] = "Rental List";
        $data['rentals'] = Rental::with(['user', 'car'])->get();
      
     
        return view('admin.rentals.index', $data);
    }

    public function show($id)
    {
        $data['header_title'] = "Rental Details";
        $data['rental'] = Rental::with(['user', 'car'])->findOrFail($id);
        return view('admin.rentals.show', $data);
    }

   


    public function create()
    {
        $data['header_title'] = "Create Rental";
        $data['cars'] = Car::where('availability', 1)->get();
        $data['users'] = User::where('role', 'customer')->get();

        //$data['unavailableDates'] = Rental::where('status', 'Ongoing')->where('car_id',  $data['cars']->id)->get()->flatMap(function ($rental) {
        //    return $this->getDateRange($rental->start_date, $rental->end_date);
        //})->unique()->values()->toArray();

        return view('admin.rentals.create', $data);
    }
    //

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric|min:0',
            'status' => 'required|in:ongoing,completed,cancelled',

        ]);

        Rental::create($request->all());

        return redirect()->route('admin.rental.index')->with('success', 'Rental created successfully.');
    }

    public function edit($id)
    {
        $data['rental'] = Rental::findOrFail($id);
        $data['cars'] = Car::all();
        $data['users'] = User::all();
        return view('admin.rentals.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric|min:0',
            'status' => 'required|in:ongoing,completed,cancelled',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update($request->all());

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy($id)
    {

        $rental = Rental::findOrFail($id);
        $rental->delete();
    

        return redirect()->route('admin.rental.index')->with('success', 'Rental deleted successfully.');
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

    public function ongoing($id){
        $rental=Rental::findOrFail($id);
        $rental->status='ongoing';
        $rental->save();
        return redirect()->back();
    }
    public function cancelled($id){
        $rental=Rental::findOrFail($id);
        $rental->status='cancelled';
        $rental->save();
        return redirect()->back();
    }
    public function completed($id){
        $rental=Rental::findOrFail($id);
        $rental->status='completed';
        $rental->save();
        return redirect()->back();
    }
}
