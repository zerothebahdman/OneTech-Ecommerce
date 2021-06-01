<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $categories = Category::with('sub_category')->get();
        $brands = Brand::latest()->get();

        $main_slider = Product::with('brand')->where('main_slider', 1)->latest()->first();
        $mid_slider = Product::with(['brand', 'category'])->where('mid_slider', 1)->latest()->paginate(3);
        $trending = Product::with('brand')->where('status', 1)->where('trending', 1)->latest()->paginate(16);
        $featured = Product::with('brand')->where('status', 1)->where('status', 1)->latest()->paginate(16);
        $best_rated = Product::with('brand')->where('status', 1)->where('best_rated', 1)->latest()->paginate(16);
        $hot_deals = Product::with('brand')->where('status', 1)->where('hot_deals', 1)->latest()->paginate(4);
        $hot_new = Product::with('brand')->where('status', 1)->where('hot_new', 1)->latest()->paginate(24);
        $computing = Product::where('category_id', 1)->where('status', 1)->latest()->paginate(24);
        $phones_tablets = Product::where('category_id', 3)->where('status', 1)->latest()->paginate(24);
        $get_one_free = Product::with('category')->where('status', 1)->where('buy_one_get_one', 1)->latest()->paginate(7);

        return view('welcome', compact('categories', 'main_slider', 'brands', 'mid_slider', 'hot_deals', 'best_rated', 'trending', 'hot_new', 'featured', 'computing', 'phones_tablets', 'get_one_free'));
    }

    public function show(Product $product)
    {
        $product_details = Product::with(['brand', 'category'])->where('products.id', $product->id)->first();


        $color = $product_details->product_color;
        $productColor = explode(',', $color);

        $size = $product_details->product_size;
        $productSize = explode(',', $size);

        return view('product_details', compact('product_details', 'productColor', 'productSize'));
    }
}
