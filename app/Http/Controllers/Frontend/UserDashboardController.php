<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserDashboardController extends Controller
{
    public function updatePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'current_password' => ['bail', 'required', 'string'],
            'password' => ['bail', 'required', 'confirmed', 'min:6']
        ]);

        $savedPassword = Auth::user()->password;
        if (Hash::check($request['current_password'], $savedPassword)) {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request['password']);

            $user->save();

            Auth::logout();
            return redirect()->route('login')->with('toast_success', 'Password Updated Successfully. Please login with your new password');
        }
    }

    public function updateProfile(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'required', 'min:3', 'string'],
            'email' => ['bail', 'required', 'email', 'string'],
            'phone_number' => ['bail', 'required', 'string'],
            'profile_photo' => ['bail', 'mimes:jpg,png,webp,jpeg']
        ]);

        $current_profile_image = $request['current_profile_image'];
        $user_profile_photo = $request->file('profile_photo');

        if ($user_profile_photo) {
            $generate_image_name = hexdec(uniqid()). '.' . $user_profile_photo->getClientOriginalExtension();
            Image::make($user_profile_photo)->resize(100,100)->save('frontend/images/avatar/' .$generate_image_name);

            @unlink($current_profile_image);
            $saveImageToDatabase = 'frontend/images/avatar/'.$generate_image_name;

            User::findOrFail(Auth::user()->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'profile_photo' => $saveImageToDatabase,
            ]);

            return back()->with('success', 'Your Profile Was Updated Successfully');
        }else {
            User::findOrFail(Auth::user()->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
            ]);

            return back()->with('success', 'Your Profile Was Updated Successfully');
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login')->with('toast_success', 'You have logged out successfully');
    }
}
