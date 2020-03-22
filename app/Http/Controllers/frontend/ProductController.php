<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Category;
use App\Product;
use App\Slider;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $data = [];
        $price = 0;
        $categories = Category::where('parent_id', 0)->get();
        $carts = Cart::where('session_id', session()->getId())->get();
        $newArrivalProducts = Product::where('visibility',1 )->orderBy('id', 'DESC')->take(10)->get();
        $sliders = Slider::where('visibility', 1)->orderBy('id', 'DESC')->take(3)->get();
        $products = Product::where('visibility', 1)->orderBy('id', 'DESC')->take(6)->get();

        foreach ($carts as $cart){
            $price = $price + $cart->price * $cart->quantity;
            $cart->price;
        }


        $data['price'] = $price;
        $data['count'] = count($carts);

        return view('frontend.index', compact('sliders','products', 'newArrivalProducts', 'carts', 'categories', 'data'));
    }



    public function show($slug){
        $product = Product::where('slug', $slug)->first();
        $related_products = Product::where('category_id', $product->category->id)->Where('id', '!=' ,$product->id)->take(8)->get();

        $data = [];
        $price = 0;
        $categories = Category::where('parent_id', 0)->get();
        $carts = Cart::where('session_id', session()->getId())->get();
        foreach ($carts as $cart){
            $price = $price + $cart->price * $cart->quantity;
        }
        $data['price'] = $price;
        $data['count'] = count($carts);

        return view('frontend.product', compact('categories', 'carts', 'data', 'product','related_products'));
    }





}
