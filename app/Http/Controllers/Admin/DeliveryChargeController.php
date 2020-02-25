<?php

namespace App\Http\Controllers\admin;

use App\DeliveryCharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryChargeController extends Controller
{
    public function index(){
        $delivery_charge_items = DeliveryCharge::all();
        return view('admin.delivery_charge.index', compact('delivery_charge_items'));
    }

    public function store(Request $request){
        $request->validate([
           'shipping_area' => 'required',
            'charge' => 'required',
        ]);
        $delivery_charge = new DeliveryCharge();
        $delivery_charge->area = $request->shipping_area;
        $delivery_charge->slug = str_replace(" ",'-',strtolower(trim($request->shipping_area)));
        $delivery_charge->charge = $request->charge;
        $delivery_charge->save();
        return redirect()->route('admin.delivery.charge.index');
    }

    public function edit($id){
        $delivery_charge_item = DeliveryCharge::find($id);
        return view('admin.delivery_charge.edit', compact('delivery_charge_item'));
    }

    public function update($id, Request $request){
        $delivery_charge_item = DeliveryCharge::find($id);
        $request->validate([
            'shipping_area' => 'required',
            'charge' => 'required'
        ]);

        $delivery_charge_item->area = $request->shipping_area;
        $delivery_charge_item->charge = $request->charge;
        $delivery_charge_item->save();

        return redirect()->route('admin.delivery.charge.index');

    }


    public function destroy($id){
        $delivery_item  = DeliveryCharge::find($id)->delete();
        return  redirect()->route('admin.delivery.charge.index');
    }
}
