<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Coupon;
use Illuminate\Support\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('adminDashboard.coupon.index', compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon' => ['bail', 'required', 'string', 'min:2', 'unique:coupons', 'max:20'],
            'discount' => ['bail', 'required', 'numeric',]
        ]);

        Coupon::insert([
            'coupon' => $request['coupon'],
            'discount' => $request['discount'],
            'slug' => SlugService::createSlug(Coupon::class, 'slug', $request->coupon),
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', $request->coupon . ' Coupon created successfully');
    }

    public function edit($slug)
    {
        $coupon = Coupon::where('slug', $slug)->first();

        return view('adminDashboard.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'coupon' => ['bail', 'required', 'string', 'min:2', 'max:50'],
            'discount' => ['bail', 'numeric', 'required']
        ]);

        Coupon::where('slug', $slug)->update([
            'coupon' => $request['coupon'],
            'discount' => $request['discount'],
            'slug' => SlugService::createSlug(Coupon::class, 'slug', $request->coupon),
        ]);

        return redirect()->route('admin.coupon.index')->with('toast_success', $request->coupon . ' Coupon Updated Successfully');
    }

    public function delete($slug)
    {
        Coupon::where('slug', $slug)->delete();

        return back()->with('success', 'Coupon deleted successfully');
    }
}