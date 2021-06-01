<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{

    public function cartDetails() {
        $cart = Cart::content();

        return view('pages.display_cart', compact('cart'));
    }

    public function check(): \Illuminate\Http\JsonResponse
    {
        $content = Cart::content();

        return response()->json($content);
    }

    public function addProductToCart(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $products = Product::where('id', $id)->first();

        if ($products->discount_price === null) {
            Cart::add([
                'id' => $products->id,
                'name' => $products->product_name,
                'qty' => $request->quantity,
                'price' => $products->selling_price,
                'weight' => 1,
                'options' => ['image' => $products->first_image, 'size' => $request['size'], 'color' => $request['color']],
            ]);

        } else {
             Cart::add([
                'id' => $products->id,
                'name' => $products->product_name,
                'qty' => $request->quantity,
                'price' => $products->discount_price,
                'weight' => 1,
                'options' => ['image' => $products->first_image, 'size' => $request['size'], 'color' => $request['color']],
            ]);

        }
        return back()->with('toast_success', $products->product_name . ' Successfully Added To Cart');
    }

    public function removeCartItem($rowId): \Illuminate\Http\RedirectResponse
    {
        Cart::remove($rowId);

        return back()->with('toast_success', 'Item removed successfully');
    }

    public function removeAllCartItem(): \Illuminate\Http\RedirectResponse
    {
        Cart::destroy();

        return redirect()->route('welcome')->with('toast_success', 'All cart item removed successfully');
    }

    public function updateCartItem(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rowId = $request['product'];
        $qty = $request['qty'];

        Cart::update($rowId, $qty);

        return back()->with('toast_success', 'Quantity updated successfully');
    }

    public function productQuickView($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::with(['sub_category', 'brand', 'category'])->where('products.id', $id)->first();

        $color = $product->product_color;
        $productColor = explode(',', $color);

        $size = $product->product_size;
        $productSize = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'size' => $productSize,
            'color' => $productColor,
        ));
    }

    public function insertCartItem(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = $request->product;

        $products = Product::where('id', $id)->first();

        if ($products->discount_price === null) {
            Cart::add([
                'id' => $products->id,
                'name' => $products->product_name,
                'qty' => $request->qty,
                'price' => $products->selling_price,
                'weight' => 1,
                'options' => ['image' => $products->first_image, 'size' => $request['size'], 'color' => $request['color']],
            ]);

        } else {
            Cart::add([
                'id' => $products->id,
                'name' => $products->product_name,
                'qty' => $request->qty,
                'price' => $products->discount_price,
                'weight' => 1,
                'options' => ['image' => $products->first_image, 'size' => $request['size'], 'color' => $request['color']],
            ]);

        }
        return back()->with('toast_success', $products->product_name . ' Successfully Added To Cart');
    }



}
