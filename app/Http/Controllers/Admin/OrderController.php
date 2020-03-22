<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use PDF;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id','desc')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function edit($id){

    }

    public function update($id, Request $request){
        $order = Order::find($id);
        $order->order_status = $request->status;
        $order->save();
        return redirect()->route('admin.order.index');
    }

    public function show($id){
        $order = Order::find($id);
        return view('admin.order.show', compact('order'));
    }

    public function invoice($id){
        $order = Order::find($id);
        $orderDetails = $order->orderDetails;
        $total_price  = 0;
        foreach ($orderDetails as $detail){
            $total_price = $total_price + $detail->product->price * $detail->quantity;
        }

//        return $total_price;




        $pdf = PDF::loadView('admin.order.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }
    public function destroy($id){
        $order = Order::find($id)->delete();
        $order_details = OrderDetails::where('order_id', $id)->delete();
        return redirect()->route('admin.order.index');
    }

}
