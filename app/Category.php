<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function sizes(){
        return $this->belongsToMany('App\Size','categories_have_sizes');
    }

    public function products(){
        return $this->belongsToMany('App\Product','products_have_categories');
    }

    public function users(){
        return $this->belongsToMany('App\User','preferences','category_id','user_id');
    }
}
