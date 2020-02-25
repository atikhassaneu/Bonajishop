<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::where('visibility', 1)->get();
        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(Request $request)
    {
        $roles = [
          'sliderTitle' => 'required',
          'sliderSubtitle' => 'required',
          'sliderImage' => 'required|mimes:jpeg,jpg,png|max:5120',// max 5120kb = 5Mb
        ];
        $request->validate($roles);


        $slider_title      = $request->sliderTitle;
        $slider_subtitle   = $request->sliderSubtitle;
        $slider_image_name = null;

        if($request->hasFile('sliderImage')){
            $image                  = $request->file('sliderImage');
            $image_extension        = $image->getClientOriginalExtension();
            $slider_image_name      = str_replace(' ','-',$slider_title)."-".uniqid().".".$image_extension;
            $slider_image           = Image::make($image)->resize(1800,710);
            $slider_thumbnail_image = Image::make($image)->resize(128,48);


            if(!file_exists(public_path('/uploads/slider'))){
                mkdir(public_path('/uploads/slider'),777,true);
            }

            if(!file_exists(public_path('/uploads/slider/thumbnail'))){
                mkdir(public_path('/uploads/slider/thumbnail'),777,true);
            }

            $slider_image->save(public_path('/uploads/slider/'.$slider_image_name));
            $slider_thumbnail_image->save(public_path('/uploads/slider/thumbnail/'.$slider_image_name));
        }

        $slider             = new Slider();
        $slider->title      = $slider_title;
        $slider->subtitle   = $slider_subtitle;
        $slider->image_path = $slider_image_name;
        $slider->save();

        session()->flash('success_message', "Slider Uploaded Successfully!");
        return redirect()->route('admin.slider.create');

    }


    public function show($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.show',compact('slider'));
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);



        $roles = [
            'sliderTitle' => 'required',
            'sliderSubtitle' => 'required',
            'sliderImage' => 'mimes:jpeg,jpg,png|max:5120',// max 5120kb = 5Mb
        ];
        $request->validate($roles);


        $slider_title      = $request->sliderTitle;
        $slider_subtitle   = $request->sliderSubtitle;
        $slider_status     = $request->status;
        $slider_image_name = $slider->image_path;

        if($request->hasFile('sliderImage')){
            // Delete old files
            if(file_exists(public_path("uploads/slider/".$slider->image_path))){
                unlink(public_path("uploads/slider/".$slider->image_path));
                unlink(public_path("uploads/slider/thumbnail/".$slider->image_path));
            }

            //process new files
            $image                  = $request->file('sliderImage');
            $image_extension        = $image->getClientOriginalExtension();
            $slider_image_name      = str_replace(' ','-',$slider_title)."-".uniqid().".".$image_extension;
            $slider_image           = Image::make($image)->resize(1800,710);
            $slider_thumbnail_image = Image::make($image)->resize(128,48);


            if(!file_exists(public_path('/uploads/slider'))){
                mkdir(public_path('/uploads/slider'),777,true);
            }

            if(!file_exists(public_path('/uploads/slider/thumbnail'))){
                mkdir(public_path('/uploads/slider/thumbnail'),777,true);
            }

            $slider_image->save(public_path('/uploads/slider/'.$slider_image_name));
            $slider_thumbnail_image->save(public_path('/uploads/slider/thumbnail/'.$slider_image_name));
        }

        $slider->title      = $slider_title;
        $slider->subtitle   = $slider_subtitle;
        $slider->image_path = $slider_image_name;
        $slider->status     = $slider_status;
        $slider->save();

        session()->flash('success_message', 'Slider Updated Successfully');
        return redirect()->route('admin.slider.index');

    }



    public function softDelete($id){
        $slider = Slider::find($id);
        $slider->visibility = 0;
        $slider->save();

        session()->flash('success_message', 'Slider Soft Deleted Successfully');
        return redirect()->route('admin.slider.index');

    }
}
