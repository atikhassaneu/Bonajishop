<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $data = [];
        $categories = Category::all();
        if($categories){
            $data['categories'] = $categories;
            return $this->responseWithSuccess("categories retrieved successfully",$data);
        }else{
            return $this->responseWithError("Category not available", $data);
        }

    }

    public function show($id){
        $data = [];

        $category = Category::find($id);
        if($category){
            $data ['product'] = $category;
            return  $this->responseWithSuccess('Category retrieved successfully', $data);
        }else{
            return $this->responseWithError("No category available",$data);
        }

    }
}
