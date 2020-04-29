<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Category')->orderBy('name');
    }

    public function producer(){
        return $this->belongsTo('App\Producer');
    }

    public function isWished(){
        return $this->belongsToMany('App\User','wish_lists')->orderBy('id')->withTimeStamps();
    }

    public function detail(){
        return $this->hasOne('App\Detail');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function likes(){
        return $this->hasMany('App\User','users_likes_products','product_id','user_id');
    }

    public function shoppingCart(){
        return $this->belongsToMany('App\ShoppingCart','shopping_carts_have_products')->withTimeStamps();
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function orders(){
        return $this->belongsToMany('App\Order','orders_have_products')->withTimeStamps();
    }
}
