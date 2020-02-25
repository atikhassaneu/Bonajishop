<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductImage;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrashController extends Controller
{
    public  function sliderIndex(){
        $sliders = Slider::where('visibility', 0)->get();
        return view('admin.trash.slider.index', compact('sliders'));
    }
    public  function categoryIndex(){
        $categories = Category::where('visibility', 0)->get();
        return view('admin.trash.category.index',compact('categories'));
    }
    public  function productIndex(){
        $products = Product::where('visibility', 0)->get();
        return view('admin.trash.product.index',compact('products'));
    }



    public function sliderRestore ($id){
        $slider = Slider::find($id);
        $slider->visibility = 1;
        $slider->save();

        session()->flash('success_message', 'Slider Restored Successfully');
        return redirect()->route('admin.trash.slider');
    }
    public function categoryRestore ($id){
        $category = Category::find($id);
        $category->visibility = 1;
        $category->save();

        session()->flash('success_message', 'Category Restored Successfully');
        return redirect()->route('admin.trash.category');
    }
    public function productRestore ($id){
        $product = Product::find($id);
        $product->visibility = 1;
        $product->save();

        session()->flash('success_message', 'Product Restored Successfully');
        return redirect()->route('admin.trash.category');

    }
    public function orderRestore ($id){

    }






    public function sliderDestroy($id)
    {
        $slider = Slider::find($id);
        if(file_exists(public_path("uploads/slider/".$slider->image_path))){
            unlink(public_path("uploads/slider/".$slider->image_path));
            unlink(public_path("uploads/slider/thumbnail/".$slider->image_path));
        }
        $slider->delete();


        session()->flash('success_message', 'Slider Deleted Successfully');
        return redirect()->route('admin.trash.slider');

    }

    public function categoryDestroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('success_message', 'Category Deleted Successfully');
        return redirect()->route('admin.trash.category');
    }

    public function productDestroy($id)
    {
        $product = Product::find($id);
        $product_image = ProductImage::where('product_id', $id)->first();

            if(file_exists(public_path("uploads/product/thumbnail/".$product->thumbnail))){
                unlink(public_path("uploads/product/thumbnail/".$product->thumbnail));
            }

            if(file_exists(public_path("uploads/product/".$product_image->image_1st))){
                unlink(public_path("uploads/product/".$product_image->image_1st));
            }
            if(file_exists(public_path("uploads/product/".$product_image->image_2nd))){
                unlink(public_path("uploads/product/".$product_image->image_2nd));
            }
            if(file_exists(public_path("uploads/product/".$product_image->image_3rd))){
                unlink(public_path("uploads/product/".$product_image->image_3rd));
            }

            $product->delete();
            $product_image->delete();

        session()->flash('success_message', 'Product Deleted Successfully');
        return redirect()->route('admin.trash.product');
    }

}
