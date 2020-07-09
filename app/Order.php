<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function address(){
        return $this->belongsTo('App\Address');
    }

    public function card(){
        return $this->belongsTo('App\Card');
    }

    public function coupon(){
        return $this->belongsTo('App\Coupon');
    }

    public function products(){
        return $this->belongsToMany('App\Product','orders_have_products')->withTimeStamps();
    }
}
