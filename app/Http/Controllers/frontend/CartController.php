<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart($product_id, $quantity = 1){
        $is_product_added = Cart::where('product_id', $product_id)->where('session_id', session()->getId())->count();

        if ($is_product_added){
            return $this->responseWithError('Product already added', '');
        }

        $product = Product::find($product_id);
        $price  = 0;
        if($product->discounted_price != 0)
            $price = $product->discounted_price;
        else
            $price = $product->price;

        $price = $price * $quantity;

        $cart = new Cart();
        $cart-> product_id = $product_id;
        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->session_id = session()->getId();
        $cart->save();
        if ($cart){
            return view('frontend.ajax.cart', compact('cart'));
        }else{
            return $this->responseWithError('There was something wrong', '');
        }
    }


    public function removeFromCart($product_id){
        $selected_cart_item = Cart::find($product_id);
        if($selected_cart_item->delete()){
            return $this->responseWithSuccess('Cart Item Removed', '');
        }else{
            return $this->responseWithError('There was something wrong', '');
        }

    }

    public function viewCart(){
        $data = [];
        $price = 0;
        $carts = Cart::where('session_id', session()->getId())->get();
        foreach ($carts as $cart){
            $price = $price + $cart->price;
        }

        $data['price'] = $price;
        $data['count'] = count($carts);

        return view('frontend.cart', compact('carts', 'data'));

    }

    public function cartUpdate(Request $request){
         $products_id   = $request->product_id;
         $quantity      = $request->cart_quantity;
         $carts         = $request->cart;

        foreach ($carts as $key => $id){
            $cart = Cart::find($id);
            $unit_price = $cart->product->discounted_price == 0 ? $cart->product->price : $cart->product->discounted_price;
            $product_quantity = $quantity[$key];

            $cart->price = $unit_price * $product_quantity;
            $cart->quantity = $product_quantity;
            $cart->save();

        }

    }
}
