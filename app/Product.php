<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category','products_have_categories')->orderBy('name');
    }

    public function producer(){
        return $this->belongsTo('App\Producer');
    }

    public function isWished(){
        return $this->belongsToMany('App\User','wish_lists')->orderBy('id');
    }

    public function detail(){
        return $this->hasOne('App\Detail');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function shoppingCart(){
        return $this->belongsToMany('App\ShoppingCart','shopping_carts_have_products');
    }

    public function Comments(){
        return $this->hasMany('App\Comment');
    }

    public function orders(){
        return $this->belongsToMany('App\Order','orders_have_products');
    }
}
