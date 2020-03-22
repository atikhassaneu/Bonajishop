<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image(){
        return $this->hasOne("App\ProductImage");
    }

    public function Carts(){
        return $this->hasMany('App\Cart', 'product_id');
    }

    public function orderDetails(){
        return $this->hasMany('App\OrderDetails', 'product_id');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
