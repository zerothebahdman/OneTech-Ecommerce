<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();

        return view('adminDashboard.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => ['bail', 'required', 'string', 'min:3', 'max:30', 'unique:brands'],
            'brand_image' => ['bail', 'required', 'mimes:jpg,png,jpg', 'image'],
        ]);

        $brand_image = $request->file('brand_image');

        $gen_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize('100', '100')->save('backend/img/brands/'.$gen_name);

        $saveToDatabase = 'backend/img/brands/'.$gen_name;

        Brand::insert([
            'brand_name' => $request['brand_name'],
            'brand_image' => $saveToDatabase,
            'slug' => SlugService::createSlug(Brand::class, 'slug', $request['brand_name']),
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Brand created successfully');
    }

    public function edit($slug)
    {
        $brands = Brand::where('slug', $slug)->first();

        return view('adminDashboard.brand.edit', compact('brands'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'brand_name' => ['bail', 'required', 'string', 'min:3', 'max:30'],
            'brand_image' => ['bail', 'mimes:jpg,png,jpeg', 'image']
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        // If brand exists in the form request then update else skip brand image
        if ($brand_image) {
            $gen_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize('100', '100')->save('backend/img/brands/'.$gen_name);

            $saveToDatabase = 'backend/img/brands/'.$gen_name;

            @unlink($old_image);

            Brand::where('slug', $slug)->update([
                'brand_name' => $request['brand_name'],
                'brand_image' => $saveToDatabase,
                'slug' => SlugService::createSlug(Brand::class, 'slug', $request->brand_name),
            ]);

            return redirect()->route('admin.brand.index')->with('success', 'Brand Updated Successfully');
        }else {
            Brand::where('slug', $slug)->update([
                'brand_name' => $request['brand_name'],
                'slug' => SlugService::createSlug(Brand::class, 'slug', $request->brand_name),
            ]);

            return redirect()->route('admin.brand.index')->with('success', 'Brand Updated Successfully');
        }
    }

    public function destroy($slug)
    {
        $brand = Brand::where('slug', $slug)->first();

        $old_image = $brand->brand_image;
        @unlink($old_image);

        $brand = Brand::where('slug', $slug)->delete();
        return back()->with('toast_success', 'Brand deleted successfully');
    }
}