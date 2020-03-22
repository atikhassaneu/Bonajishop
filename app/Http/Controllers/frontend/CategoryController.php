<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($category){
        $data = [];
        $price = 0;
        $categories = Category::where('parent_id', 0)->get();
        $carts = Cart::where('session_id', session()->getId())->get();
        foreach ($carts as $cart){
            $price = $price + $cart->price * $cart->quantity;
        }

        $data['price'] = $price;
        $data['count'] = count($carts);

        $category = Category::where('slug', $category)->first();
        $products = Product::where('category_id',$category->id)->orderBy('id','desc')->paginate(12);
        return view('frontend.products.category.index', compact('categories','carts', 'data', 'products'));

    }
}
