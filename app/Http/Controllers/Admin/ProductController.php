<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('visibility', 1)->paginate(5);
//        return view('test');
        return view('admin.product.index',compact('products'));
    }


    public function create()
    {
        $categories = Category::where('visibility',1)->get();
        return view('admin.product.create',compact('categories'));

    }


    public function store(Request $request)
    {
        $roles = [
          'productTitle'            => 'required',
          'category'                => 'required',
          'price'                   => 'required|numeric',
          'discount'                => 'required|numeric',
          'discount_type'           => 'required',
          'productShortDescription' => 'required',
          'productDescription'      => 'required',
          'thumbnail'               => 'required',
          'productImageFirst'       => 'required',
          'ProductImageSecond'      => 'required',
          'ProductImageThird'       => 'required',
          'status'                  => 'required',
          'stock'                   => 'required|numeric',
          'productTag'              => 'required'
        ];
        $request->validate($roles);


        if (!file_exists(public_path('uploads/product'))){
            mkdir(public_path('uploads/product'),777, true);
            mkdir(public_path('uploads/product/thumbnail'),777, true);
        }


//      process thumbnail Image
        $thumbnail_image             = Image::make(public_path($request->thumbnail))->resize(600,600);
        $thumbnail_image_extension   =  $this->getExtension($request->thumbnail);
        $thumbnail_image_name        =  $this->uniqueFileName($request->productTitle).".".$thumbnail_image_extension;
        $thumbnail_image->save(public_path('uploads/product/thumbnail/'.$thumbnail_image_name));

//      process product Image
        $productImageFirst  = $this->uploadProductImage($request->productImageFirst, $request->productTitle);
        $productImageSecond = $this->uploadProductImage($request->ProductImageSecond, $request->productTitle);
        $productImageThird  = $this->uploadProductImage($request->ProductImageThird, $request->productTitle);


//        calculate discount
        $discounted_price = 0;
        if (isset($request->discount) && $request->discount != 0){
            $type  = strtolower($request->discount_type);
            if($type == 'percentage'){
                $price               = $request->price;
                $percentOfDiscount   = $request->discount;
                $discount            = $price * ($percentOfDiscount/100);
                $discounted_price    = ceil($price - $discount);
            }

            if ($type == 'manual'){
                $discounted_price = ceil($request->price - $request->discount);
            }
        }


//      store data into database
        $product                    = new Product();
        $product->category_id       = $request->category;
        $product->title             = $request->productTitle;
        $product->price             = $request->price;
        $product->discounted_price  = $discounted_price;
        $product->short_description = $request->productShortDescription;
        $product->description       = $request->productDescription;
        $product->thumbnail         = $thumbnail_image_name;
        $product->slug              = $this->slug($request->productTitle);
        $product->stock             = $request->stock;
        $product->status             = $request->status;
        $product->tag               = $request->productTag;
        $product->save();

//      store product image into database
        $product_id = $product->id;
        $product_image = new ProductImage();
        $product_image->product_id = $product_id;
        $product_image->image_1st = $productImageFirst;
        $product_image->image_2nd = $productImageSecond;
        $product_image->image_3rd = $productImageThird;
        $product_image->save();

        session()->flash('success_message','Product Created Successfully');
        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('visibility',1)->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $roles = [
            'productTitle'            => 'required',
            'category'                => 'required',
            'price'                   => 'required|numeric',
            'discounted_price'        => 'required|numeric',
            'productShortDescription' => 'required',
            'productDescription'      => 'required',
            'status'                  => 'required',
            'stock'                   => 'required|numeric',
            'productTag'              => 'required'
        ];
        $request->validate($roles);


        if (!file_exists(public_path('uploads/product'))){
            mkdir(public_path('uploads/product'),777, true);
            mkdir(public_path('uploads/product/thumbnail'),777, true);
        }


        $product = Product::find($id);
        $thumbnail_image_name = $product->thumbnail;

        $productImages      = ProductImage::where('product_id', $id)->first();
        $productImageFirst  = $productImages->image_1st;
        $productImageSecond = $productImages->image_2nd;
        $productImageThird  = $productImages->image_3rd;


        if(isset($request->thumbnail)) {
            if(file_exists(public_path('uploads/product/thumbnail/' . $thumbnail_image_name))){
                unlink(public_path('uploads/product/thumbnail/' . $thumbnail_image_name));
            }
//      process thumbnail Image
            $thumbnail_image = Image::make(public_path($request->thumbnail))->resize(600, 600);
            $thumbnail_image_extension = $this->getExtension($request->thumbnail);
            $thumbnail_image_name = $this->uniqueFileName($request->productTitle) . "." . $thumbnail_image_extension;
            $thumbnail_image->save(public_path('uploads/product/thumbnail/' . $thumbnail_image_name));

        }

//      process product Image
        if(isset($request->productImageFirst)){
            if(file_exists(public_path('uploads/product/'.$productImageFirst))){
                unlink(public_path('uploads/product/'.$productImageFirst));
            }
            $productImageFirst  = $this->uploadProductImage($request->productImageFirst, $request->productTitle);
        }

        if(isset($request->ProductImageSecond)){
            if(file_exists(public_path('uploads/product/'.$productImageSecond))){
                unlink(public_path('uploads/product/'.$productImageSecond));
            }
            $productImageSecond = $this->uploadProductImage($request->ProductImageSecond, $request->productTitle);
        }

        if(isset($request->ProductImageThird)){
            if(file_exists(public_path('uploads/product/'.$productImageThird))){
                unlink(public_path('uploads/product/'.$productImageThird));
            }
            $productImageThird  = $this->uploadProductImage($request->ProductImageThird, $request->productTitle);
        }




//      store data into database
        $product                    = Product::find($id);
        $product->category_id       = $request->category;
        $product->title             = $request->productTitle;
        $product->price             = $request->price;
        $product->discounted_price  = $request->discounted_price;
        $product->short_description = $request->productShortDescription;
        $product->description       = $request->productDescription;
        $product->thumbnail         = $thumbnail_image_name;
        $product->slug              = $this->slug($request->productTitle);
        $product->stock             = $request->stock;
        $product->status             = $request->status;
        $product->tag               = $request->productTag;
        $product->save();


        $productImages->product_id = $id;
        $productImages->image_1st = $productImageFirst;
        $productImages->image_2nd = $productImageSecond;
        $productImages->image_3rd = $productImageThird;
        $productImages->save();

        session()->flash('success_message','Product Updated Successfully');
        return redirect()->route('admin.product.index');

    }


    public function destroy($id)
    {

    }


    public function softDelete($id)
    {
        $product = Product::find($id);
        $product->visibility = 0;
        $product->save();

        session()->flash('success_message','Product Soft Deleted Successfully');
        return redirect()->route('admin.product.index');
    }

    private function getExtension($string){
        $array = explode('.', $string);
        $extension = end($array);
        return $extension;
    }

    private function  uniqueFileName($string){
        $string     = strtolower(substr($string , 0, 32));
        $string     = $string."-".Carbon::now()."-".uniqid();
        $string     = str_replace(' ','-',$string); // replace space by hyphens
        $string     = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return $string;
    }

    private  function uploadProductImage($path, $title){
        $image             = Image::make(public_path($path))->resize(800,800);
        $image_extension   =  $this->getExtension($path);
        $image_name        =  $this->uniqueFileName($title).".".$image_extension;
        $image->save(public_path('uploads/product/'.$image_name));
        return $image_name;
    }

    private function slug($string){
        $string     = str_replace(' ','-',$string); // replace space by hyphens
        //$string     = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return $string;
    }
}
