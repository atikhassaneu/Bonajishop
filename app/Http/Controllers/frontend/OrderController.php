<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\DeliveryCharge;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $data = [];
        $price = 0;
        $carts = Cart::where('session_id', session()->getId())->get();
        $delivery_charge_items =  DeliveryCharge::all();

        foreach ($carts as $cart){
            $price = $price + $cart->price;
            $cart->price;

        }

        $data['price'] = $price;
        $data['count'] = count($carts);

        return view('frontend.order', compact('data', 'carts', 'delivery_charge_items'));

    }


    public function orderConfirm(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'shipping_area' => 'required',
            'payment_method' => 'required'
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $post_code = $request->post_code;
        $city = $request->city;
        $shipping_area = $request->shipping_area;
        $payment_method = $request->payment_method;
        $bkash_tr_id = $request->bkash_tr_id;
        $delivery_charge_item = DeliveryCharge::where('slug', $shipping_area)->get()->first();
        $delivery_charge = $delivery_charge_item->charge;
        $total  = 0;

        $carts =  Cart::where('session_id', session()->getId())->get();
        foreach ($carts as $cart){
            $total = $total + $cart->price;
        }
        $total = $total + $delivery_charge;

        $order = new Order();
        $order->name = $name;
        $order->email = $email;
        $order->phone = $phone;
        $order->address = $address;
        $order->post_code = $post_code;
        $order->city = $city;
        $order->payment_method = $payment_method;
        $order->bkash_verification_code = $bkash_tr_id;
        $order->delivery_charge = $delivery_charge;
        $order->total_price = $total;
        $order->save();

        $order_id = $order->id;
        foreach ($carts as $cart){
            $order_detail = new OrderDetails();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $cart->product->id;
            $order_detail->unit_price = $cart->product->discounted_price == 0? $cart->product->price : $cart->product->discounted_price;
            $order_detail->quantity = $cart->quantity;
            $order_detail->save();
        }

        Cart::where('session_id', session()->getId())->delete();

        return redirect()->route('home');

    }
}
