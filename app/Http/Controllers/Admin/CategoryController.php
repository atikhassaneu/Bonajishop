<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::where('visibility',1)->paginate(10);
        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        $parent_categories = Category::where('parent_id', 0)->get();
        return view('admin.category.create',compact('parent_categories'));
    }

    public function store(Request $request)
    {
        $roles = [
            'categoryName' => 'required|string|max:255'
        ];
        $request->validate($roles);

        $category_name = $request->categoryName;
        $slug          = str_replace(' ','-',$category_name);
        $parent_id     = $request->parentCategory;

        $category            = new Category();
        $category->category  = $category_name;
        $category->slug      = $slug;
        $category->parent_id = $parent_id;
        $category->save();

        session()->flash('success_message', 'Category Created Successfully');
        return redirect()->route('admin.category.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category           = Category::find($id);
        $parent_categories  = Category::where('parent_id',0)->get();

        return view('admin.category.edit',compact('category','parent_categories'));
    }


    public function update(Request $request, $id)
    {

        $roles = [
            'categoryName' => 'required|string|max:255'
        ];
        $request->validate($roles);

        $category_name = $request->categoryName;
        $slug          = str_replace(' ','-',$category_name);
        $parent_id     = $request->parentCategory;
        $status     = $request->status;

        $category            = Category::find($id);
        $category->category  = $category_name;
        $category->slug      = $slug;
        $category->parent_id = $parent_id;
        $category->status    = $status;
        $category->save();

        session()->flash('success_message', 'Category Updated Successfully');
        return redirect()->route('admin.category.index');

    }

    public function softDelete($id){
        $category = Category::find($id);
        $category->visibility = 0;
        $category->save();

        session()->flash('success_message', 'Category Deleted Successfully');
        return redirect()->route('admin.category.index');
    }
}
