<?php

namespace App\Http\Controllers\Api;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(){
        $data = [];
        $sliders = Slider::all();
        $data['sliders'] = $sliders;

        if($sliders){
            return $this->responseWithSuccess("Slider retrieved successfully", $data);
        }else{
            return $this->responseWithError('No slider available', $data);
        }
    }
}
