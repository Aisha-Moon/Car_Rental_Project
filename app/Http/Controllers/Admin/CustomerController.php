<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function login(){
        $data['header_title']='Login';
        return view('auth.login',$data);
    }
    public function register(){
        $data['header_title']='Register';
        return view('auth.register',$data);
    }
    public function register_post(Request $request)
{
    $userData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',  
        'password' => 'required|string|min:3',
        'confirm_password' => 'required|string|same:password',
        'phone_number' => 'nullable|string',  
        'address' => 'nullable|string', 
    ]);

    
    $user = new User();
    $user->name = trim($request->name);
    $user->email = trim($request->email);
    $user->password = $request->password;
    $user->phone_number = trim($request->phone_number);  
    $user->address = trim($request->address);  
    $user->save();

    return redirect('/login')->with('success', 'Registration successful');
}

public function login_post(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if ($user && $user->password === $request->password) {
        Auth::login($user);

        if ($user->isAdmin()) {
            return redirect('admin/dashboard');
        } 
        else if ($user->isCustomer()) {
            return redirect('/');
        }
    } 

    return redirect()->back()->with('error', 'Invalid email or password');
}



public function admin_dashboard(Request $request)
{
    $data['header_title'] = 'Admin Dashboard';
    $data['cars'] = Car::count();
    $data['rentals'] = Rental::count();
    $data['available'] = Car::where('availability', 1)->count();
    $data['total_earning'] = Rental::sum('total_cost');

    return view('admin.dashboard.index', $data);
}

    public function logout(){
        Auth::logout();
        return redirect('/');
    } 

    public function index()
    {
        $data['customers'] = User::where('role', 'customer')->get();
        $data['header_title'] = "Manage customer";
        return view('admin.customer.index', $data);
    }

    public function create()
    {
        $data['header_title'] = "Add Customer";
        return view('admin.customer.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
            'password' => 'required|string|min:3',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => 'customer',
            'password'=>$request->password

        ]);

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $data['customer'] = User::with('rentals')->findOrFail($id);
        $data['header_title'] = "Customer Details";
        return view('admin.customer.show', $data);
    }

    public function edit($id)
    {
        $data['customer'] = User::findOrFail($id);
        $data['header_title'] = "Edit Customer";
        return view('admin.customer.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
            'password' => 'nullable|min:8|confirmed', 
        ]);
    
        $customer = User::findOrFail($id);
    
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request->input('phone_number');
        $customer->address = $request->input('address');
    
        if ($request->filled('password')) {
            $customer->password =$request->password;
        }
    
        $customer->save();
    
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }
    

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}


