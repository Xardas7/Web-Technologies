<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','preferences','producer_id','user_id');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function categories(){
        return $this->belongsToMany('App\Category','preferences','producer_id','category_id');
    }
}
