<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category','categories_have_sizes')->withTimeStamps();
    }
}
