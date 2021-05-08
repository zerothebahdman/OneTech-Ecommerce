<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users\Wishlist;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function addWishList($id)
    {
        $user = Auth::id();
        $check_if_wishlist_exists = Wishlist::where('user_id', $user)->where('product_id', $id)->first();

        if (Auth::check()) {
            if ($check_if_wishlist_exists) {
                return \Response::json(['error' => 'This product already exists in your wishlist']);
            } else {
                Wishlist::create([
                    'user_id' => $user,
                    'product_id' => $id,
                ]);

                return \Response::json(['success' => 'Product added to wishlist']);
            }

        } else {
           return response()->json(['error' => 'Please login into your account first']);
        }

    }
}