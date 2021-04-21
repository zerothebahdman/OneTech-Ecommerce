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
        $categories = Category::with('subCategory')->get();
        $brands = Brand::latest()->get();

        $main_slider = Product::with('brand')->where('main_slider', 1)->latest()->first();
        $mid_slider = Product::with('brand')->where('mid_slider', 1)->latest()->first();
        $trending = Product::with('brand')->where('trending', 1)->latest()->first();
        $best_rated = Product::with('brand')->where('best_rated', 1)->latest()->first();
        $hot_deals = Product::with('brand')->where('hot_deals', 1)->latest()->first();
        $hot_new = Product::with('brand')->where('hot_new', 1)->latest()->first();

        return view('welcome', compact('categories', 'main_slider', 'brands', 'mid_slider', 'hot_deals', 'best_rated', 'trending', 'hot_new'));
    }
}
