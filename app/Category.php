<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function sizes(){
        return $this->belongsToMany('App\Size','categories_have_sizes')->withTimeStamps();
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function users(){
        return $this->belongsToMany('App\User','preferences','category_id','user_id')->withTimeStamps();
    }
}
