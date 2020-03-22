<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart($product_id, $quantity = 1){
        $is_product_added = Cart::where('product_id', $product_id)->where('session_id', session()->getId())->where('quantity', $quantity)->count();

        if ($is_product_added){
            return $this->responseWithError('Product already added', '');
        }

        $is_change_quantity = Cart::where('product_id', $product_id)->where('session_id', session()->getId())->where('quantity','!=', $quantity)->count();

        if($is_change_quantity){
            $cart = Cart::where('product_id', $product_id)->where('session_id', session()->getId())->first();
            $cart->quantity = $quantity;
            $cart->save();
            $total_price = $this->totalPrice();
            return $this->responseWithSuccess('Cart updated', ["cart_id"=> $cart->id, "total_price"=> $total_price,"quantity"=> $quantity]);
        }

        $product = Product::find($product_id);
        $price  = 0;
        if($product->discounted_price != 0)
            $price = $product->discounted_price;
        else
            $price = $product->price;

        $cart = new Cart();
        $cart-> product_id = $product_id;
        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->session_id = session()->getId();
        $cart->save();
        if ($cart){
            $data = [];
            $data['id'] = $cart->id;
            $data['thumbnail'] = asset('uploads/product/thumbnail/'.$cart->product->thumbnail);
            $data['title'] = $cart->product->title;
            $data['unit_price'] = $cart->price;
            $data['quantity'] = $cart->quantity;
            $data['total_price'] = $this->totalPrice();
            $data['cart_item_num'] = $this->cartItemNo();
            return $this->responseWithSuccess('item added successfully', $data);
        }

        return $this->responseWithError('There was something wrong', '');

    }

    public function removeFromCart($product_id){
        $selected_cart_item = Cart::find($product_id);
        if($selected_cart_item->delete()){
            $data = [];
            $data['total_price'] = $this->totalPrice();
            $data['cart_item_num'] = $this->cartItemNo();
            return $this->responseWithSuccess('Cart item Removed successfully', $data);
        }else{
            return $this->responseWithError('There was something wrong', '');
        }

    }

    public function viewCart(){
        $data = [];
        $price = 0;
        $categories = Category::where('parent_id', 0)->get();
        $carts = Cart::where('session_id', session()->getId())->get();
        foreach ($carts as $cart){
            $price = $price + $cart->price * $cart->quantity;
        }

        $data['price'] = $price;
        $data['count'] = count($carts);

        return view('frontend.cart', compact('carts', 'categories', 'data'));

    }

    public function cartUpdate(Request $request){
         $products_id   = $request->product_id;
         $quantity      = $request->cart_quantity;
         $carts         = $request->cart;

        foreach ($carts as $key => $id){
            $cart = Cart::find($id);
            #$unit_price = $cart->product->discounted_price == 0 ? $cart->product->price : $cart->product->discounted_price;
            $product_quantity = $quantity[$key];

            #$cart->price = $unit_price * $product_quantity;
            $cart->quantity = $product_quantity;
            $cart->save();

        }

    }

    private function totalPrice()
    {
        $carts = Cart::where('session_id', session()->getId())->get();
        $total_price = 0;
        foreach ($carts as $c){
            $total_price = $total_price + $c->price * $c->quantity;
        }
        return $total_price;
    }

    private function cartItemNo(){
        return Cart::where('session_id', session()->getId())->count();
    }
}
