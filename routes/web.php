<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// frontend
Route::get('/', 'frontend\ProductController@index')->name('home');
Route::get('cart', 'frontend\CartController@viewCart')->name('cart.view');
Route::get('order', 'frontend\OrderController@index')->name('order');
Route::get('contact', 'frontend\ContactController@index')->name('contact');
Route::post('contact', 'frontend\ContactController@store')->name('contact.store');
Route::post('order-confirm', 'frontend\OrderController@orderConfirm')->name('order.confirm');


//Route ajax request
Route::get('ajax/product/{id}', 'frontend\ProductController@showModalData');
Route::get('ajax/cart/{product_id}', 'frontend\CartController@addToCart');
Route::get('ajax/cart/remove/{product_id}', 'frontend\CartController@removeFromCart');
Route::get('ajax/cart-update', 'frontend\CartController@cartUpdate');

Auth::routes();

Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('order', 'OrderController@index')->name('order.index');
    Route::get('order/{id}/show', 'OrderController@show')->name('order.show');
    Route::get('order/{id}/edit', 'OrderController@edit')->name('order.edit');
    Route::put('order/{id}/edit', 'OrderController@update')->name('order.update');
    Route::delete('order/{id}/destroy', 'OrderController@destroy')->name('order.destroy');

    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::get('contact/{id}/show', 'ContactController@show')->name('contact.show');
    Route::delete('contact/{id}/delete', 'ContactController@destroy')->name('contact.destroy');

    Route::resource('slider','SliderController');
    Route::put('slider/soft-delete/{id}','SliderController@softDelete')->name('slider.soft.delete');
    Route::resource('category','CategoryController');
    Route::put('category/soft-delete/{id}','CategoryController@softDelete')->name('category.soft.delete');
    Route::resource('product','ProductController');
    Route::put('product/soft-delete/{id}','ProductController@softDelete')->name('product.soft.delete');

    Route::get('trash/slider','TrashController@sliderIndex')->name('trash.slider');
    Route::get('trash/category','TrashController@categoryIndex')->name('trash.category');
    Route::get('trash/product','TrashController@productIndex')->name('trash.product');

    Route::put('trash/slider/{id}','TrashController@sliderRestore')->name('trash.slider.restore');
    Route::put('trash/category/{id}','TrashController@categoryRestore')->name('trash.category.restore');
    Route::put('trash/product/{id}','TrashController@productRestore')->name('trash.product.restore');
    Route::put('trash/order/{id}','TrashController@orderRestore')->name('trash.order.restore');

    Route::delete('trash/slider/{id}','TrashController@sliderDestroy')->name('trash.slider.destroy');
    Route::delete('trash/category/{id}','TrashController@categoryDestroy')->name('trash.category.destroy');
    Route::delete('trash/product/{id}','TrashController@productDestroy')->name('trash.product.destroy');
    Route::delete('trash/order/{id}','TrashController@orderDestroy')->name('trash.order.destroy');

    Route::get('delivery-charge', 'DeliveryChargeController@index')->name('delivery.charge.index');
    Route::post('delivery-charge', 'DeliveryChargeController@store')->name('delivery.charge.store');
    Route::get('delivery-charge/{id}/edit', 'DeliveryChargeController@edit')->name('delivery.charge.edit');
    Route::put('delivery-charge/{id}/update', 'DeliveryChargeController@update')->name('delivery.charge.update');
    Route::delete('delivery-charge/{id}/destroy', 'DeliveryChargeController@destroy')->name('delivery.charge.destroy');

});




