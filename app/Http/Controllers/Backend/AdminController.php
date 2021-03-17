<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout();

        return redirect()->route('login')->with('toast_success', 'You have logged out successfully');
    }
}