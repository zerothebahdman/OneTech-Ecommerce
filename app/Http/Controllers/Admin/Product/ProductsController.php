<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function getSubCat($category_id)
    {
        $category = SubCategory::where('category_id', $category_id)->pluck('sub_category_name', 'id');

        return json_encode($category);
    }

    public function index()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::with(['subCategory', 'category'])->latest()->get();

        return view('adminDashboard.products.index', compact('products', 'categories', 'brands'));
    }

    public function store(Request $request)
    {
         $request->validate([
             'category_id' => ['bail', 'required'],
             'sub_category_id' => ['bail', 'required'],
             'product_name' => ['bail', 'required', 'string', 'min:3', 'max:30', 'unique:products,product_name'],
             'product_quantity' => ['bail', 'required', 'numeric'],
             'product_color' => ['bail', 'string'],
             'selling_price' => ['bail', 'required', 'numeric'],
             'first_image' => ['bail', 'required', 'mimes:jpg,png,jpeg', 'image'],
             'second_image' => ['bail', 'required', 'mimes:jpg,png,jpeg', 'image'],
             'third_image' => ['bail', 'required', 'mimes:jpg,png,jpeg', 'image'],
             'product_details' => ['bail', 'required', 'string', 'min:9', 'max:1000']
         ]);

        $image_one = $request->file('first_image');
        $image_two = $request->file('second_image');
        $image_three = $request->file('third_image');

        if ($image_one && $image_two && $image_three) {
            $gen_image_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize('300', '300')->save('backend/img/products/'.$gen_image_one);

            $gen_image_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize('300', '300')->save('backend/img/products/'.$gen_image_two);

            $gen_image_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize('300', '300')->save('backend/img/products/'.$gen_image_three);
        }

        $saveImageOneToDatabase = 'backend/img/products/'.$gen_image_one;
        $saveImageTwoToDatabase = 'backend/img/products/'.$gen_image_two;
        $saveImageThreeToDatabase = 'backend/img/products/'.$gen_image_three;

        Product::create([
           'product_name' => $request['product_name'],
            'category_id' => $request['category_id'],
            'sub_category_id' => $request['sub_category_id'],
            'brand_id' => $request['brand_id'],
            'slug' => SlugService::createSlug(Product::class, 'slug', $request['product_name']),
            'product_code' => rand(2, 99999),
            'product_color' => $request['product_color'],
            'discount_price' => $request['discount_price'],
            'selling_price' => $request['selling_price'],
            'product_size' => $request['product_size'],
            'product_quantity' => $request['product_quantity'],
            'product_details' => $request['product_details'],
            'first_image'  => $saveImageOneToDatabase,
            'second_image'  => $saveImageTwoToDatabase,
            'third_image'  => $saveImageThreeToDatabase,
            'best_rated' => $request['best_rated'],
            'mid_slider' => $request['mid_slider'],
            'trending' => $request['trending'],
            'hot_new' => $request['hot_new'],
            'hot_deals' => $request['hot_deals'],
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
//        Product::insert($data);
        // return response()->json($data, 200, $headers);
         return back()->with('success', 'Product added successfully');

    }
}
