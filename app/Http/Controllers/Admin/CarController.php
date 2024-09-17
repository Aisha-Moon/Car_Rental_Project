<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function car_list(){
        $data['cars']=Car::all();
        return view('admin.cars.list',$data);
    }
    public function car_add(){

        return view('admin.cars.add');
    }
    public function addCar(CarRequest $request)
    {
       

        $carImage = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $carImage = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/cars'), $carImage);
        }

        Car::create([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'car_type' => $request->input('car_type'),
            'daily_rent_price' => $request->input('daily_rent_price'),
            'availability' => $request->input('availability'),
            'image' => $carImage,
        ]);

        return redirect('/admin/car/list')->with('success', 'Car added successfully.');
    }
    public function edit_page($id)
    {
        $data['getCar'] = Car::findOrFail($id);

        return view('admin.cars.edit', $data);
    }
    public function update(CarRequest $request, $id)
{
    $car = Car::findOrFail($id);

    $carImage = $car->image;

    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $carImage = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images/cars'), $carImage);

        if ($car->image && file_exists(public_path('images/cars/' . $car->image))) {
            unlink(public_path('images/cars/' . $car->image));
        }
    }

    $car->update([
        'name' => $request->input('name'),
        'brand' => $request->input('brand'),
        'model' => $request->input('model'),
        'year' => $request->input('year'),
        'car_type' => $request->input('car_type'),
        'daily_rent_price' => $request->input('daily_rent_price'),
        'availability' => $request->boolean('availability'), 
        'image' => $carImage, 
    ]);

    return redirect('/admin/car/list')->with('success', 'Car updated successfully.');
}

public function delete($id)
{
    $car = Car::findOrFail($id);

    if ($car->image && file_exists(public_path('images/cars/' . $car->image))) {
        unlink(public_path('images/cars/' . $car->image));
    }

    $car->delete();

    return redirect('/admin/car/list')->with('success', 'Car deleted successfully.');
}




}
