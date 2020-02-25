<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public  function parentCategory(){
        return $this->belongsTo('App\Category','parent_id');
    }
}
