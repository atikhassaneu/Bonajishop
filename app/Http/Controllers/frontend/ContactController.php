<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Category;
use App\Contact;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $data = [];
        $price = 0;
        $categories = Category::where('parent_id', 0)->get();
        $carts = Cart::where('session_id', session()->getId())->get();
        foreach ($carts as $cart){
            $price = $price + $cart->price;
            $cart->price;

        }
        $data['price'] = $price;
        $data['count'] = count($carts);

        return view('frontend.contact', compact('carts','categories', 'data'));
    }

    public function store(Request $request){

        $request->validate([
           'name' => 'required',
           'phone' => 'required',
           'message' => 'required',
           'g-recaptcha-response' => 'required'
        ]);
        $token = $request->input('g-recaptcha-response');

        if($token){
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
                'form_params' => [
                    'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                    'response' => $token
                ]
            ]);

            $result = json_decode((string)$response->getBody()->getContents());

            if($result->success){
                $data = $request->except('_token');
                $contact = Contact::create($data);
            }
        }

        return redirect()->route('contact');
    }

}
