<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name',  'phone', 'address', 'post_code', 'city', 'payment_method', 'delivery_charge', 'total_price'];

    public function orderDetails(){
        return $this->hasMany('App\OrderDetails');
    }
}
