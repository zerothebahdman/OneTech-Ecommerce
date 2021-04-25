<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function index(){
        return view('adminDashboard.dashboard');
    }

    public function store(Request $request){
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'This does not match our records'
            ]);
        }
        return redirect()->intended(route('admin.dashboard'))->with('toast_success', 'Welcome Back ' .Auth::guard('admin')->user()->name);

    }

    public function profile()
    {
        if (Auth::guard('admin')->user()) {
            $profile = Admin::findOrFail(Auth::guard('admin')->user()->id);
            if ($profile) {
                return view('adminDashboard.profileSetup.profile_page', compact('profile'));
            }
        }
    }

    public function displayProfile(){
        if (Auth::guard('admin')->user()) {
            $adminProfile = Admin::findOrFail(Auth::guard('admin')->user()->id);
            if ($adminProfile) {
                return view('adminDashboard.profileSetup.profile_settings', compact('adminProfile'));
            }
        }
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'email', 'string'],
            'image' => ['bail', 'mimes:jpg,jpeg,png'],
        ]);

        $old_image = $request['old_image'];
        $profile_photo = $request->file('image');

        if ($profile_photo) {
            $gen_name = hexdec(uniqid()).'.'.$profile_photo->getClientOriginalExtension();
            Image::make($profile_photo)->resize(500, 500)->save('backend/img/avatars/'.$gen_name);

            $saveImageToDatabase = 'backend/img/avatars/'.$gen_name;

            @unlink($old_image);

            Admin::findOrFail(Auth::guard('admin')->user()->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'profile_photo' => $saveImageToDatabase,
            ]);

            return back()->with('success', 'Profile Updated Successfully');
        }else {
            Admin::findOrFail(Auth::guard('admin')->user()->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
            ]);

            return back()->with('success', 'Profile Updated Successfully');
        }
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['bail', 'required', 'string'],
            'password' => ['bail', 'required', 'string', 'confirmed', 'min:7'],
        ]);

        $hashPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->current_password, $hashPassword)) {
            $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
            $admin->password = Hash::make($request->password);

            $admin->save();

            Auth::guard('admin')->logout();

            return redirect()->route('admin.login')->with('toast_success', 'Password Updated Successfully. Please login with your new password');
        }else {
            return back()->with('error', 'Opps! Something went wrong');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('toast_success', 'You have logged out successfully');
    }
}
