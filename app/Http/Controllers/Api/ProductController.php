<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $data =[];

        $products = Product::all();
        if ($products){
            $data ['products'] = $products;
            return  $this->responseWithSuccess('product retrieved successfully', $data);
        }else{
            return $this->responseWithError("No product available",$data);
        }

    }

    public function show($id){
        $data = [];

        $product = Product::find($id);
        if($product){
            $data ['product'] = $product;
            return  $this->responseWithSuccess('product retrieved successfully', $data);
        }else{
            return $this->responseWithError("No product available",$data);
        }

    }
}
