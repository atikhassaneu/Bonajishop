<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function responseWithSuccess($message = '', $data=[], $code =200){
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'data'    => $data,
        ],$code);
    }

    public function responseWithError($message = '', $data=[], $code =300){
        return response()->json([
            'status'  => 'fail',
            'message' => $message,
            'data'    => $data,
        ],$code);
    }
}
