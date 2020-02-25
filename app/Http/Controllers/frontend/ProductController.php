<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
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
        $carts = Cart::where('session_id', session()->getId())->get();
        $newArrivalProducts = Product::where('visibility',1 )->orderBy('id', 'DESC')->take(10)->get();
        $sliders = Slider::where('visibility', 1)->orderBy('id', 'DESC')->take(3)->get();
        $products = Product::where('visibility', 1)->orderBy('id', 'DESC')->take(6)->get();

        foreach ($carts as $cart){
            $price = $price + $cart->price;
            $cart->price;

        }


        $data['price'] = $price;
        $data['count'] = count($carts);


        return view('frontend.index', compact('sliders','products', 'newArrivalProducts', 'carts', 'data'));
    }




    public function showModalData($id){

        $product = Product::find($id);
        if ($product){
            $image   = Product::find($id)->image;

            return response()->json($product);
        }
        return $this->responseWithError('bad request', 'product not found', 300);
    }





}
