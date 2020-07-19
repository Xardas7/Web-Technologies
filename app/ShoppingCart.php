<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable=['user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function products(){
        return $this->belongsToMany('App\Product','shopping_carts_have_products','shoppingcart_id')
        ->as('shoppingCartDetails')
        ->withPivot('quantity','size')
        ->withTimeStamps()
        ;
    }
}
