<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
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
    $user->password = Hash::make($request->password);
    $user->phone_number = trim($request->phone_number);  
    $user->address = trim($request->address);  
    $user->save();

    return redirect('/login')->with('success', 'Registration successful');
}

public function login_post(Request $request)
{
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        if (Auth::user()->role == 'admin') {
            return redirect('admin/dashboard');  
        }
        else if (Auth::user()->role == 'customer') {
            return redirect('/');  
        }
    } 
    return redirect()->back()->with('error', 'Please enter a valid email address or password');
}

public function admin_dashboard(Request $request){
    $data['header_title']='Admin';
    return view('admin.dashboard.index',$data);
}
    public function logout(){
        Auth::logout();
        return redirect('/');
    } 

}
