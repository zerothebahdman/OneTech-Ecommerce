<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::where('id', $id)->first();

        if (Auth::check()) {
            if ($product->discount_price === null) {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => ['image' => $product->first_image],
                ]);

                return response()->json(['success' => 'Product Successfully added to cart']);
            } else {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => ['image' => $product->first_image],
                ]);

                return response()->json(['success' => 'Product Successfully added to cart']);
            }
        } else {
            return response()->json(['error' => 'Please login into your account first']);
        }
    }

    public function check()
    {
        $content = Cart::content();

        return response()->json($content);
    }
}