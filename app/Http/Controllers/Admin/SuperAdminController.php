<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;

class SuperAdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function index(){
        return view('admin.dashboard');
    }

    public function store(Request $request){
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'This does not match our records'
            ]);
        }
        return redirect()->intended(route('admin.dashboard'))->with('toast_success', 'Welcome Back ' .Auth::guard('admin')->user()->name);

    }

    public function displayProfile(){
        $adminProfile = Admin::all();
        return view('admin.profile_settings', compact('adminProfile'));
    }

    public function updateProfile(Request $request) {

    }

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('toast_success', 'You have logged out successfully');
    }
}
