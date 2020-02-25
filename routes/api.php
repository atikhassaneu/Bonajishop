<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return "Hello";
//});

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::get('products', 'ProductController@index');
    Route::get('product/{id}', 'ProductController@show');
    Route::get('categories', 'CategoryController@index');
    Route::get('category/{id}', 'CategoryController@show');
    Route::get('sliders', 'SliderController@index');

});






