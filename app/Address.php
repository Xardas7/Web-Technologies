<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // protected $guarded=[];
     protected $fillable = ['user_id','country','city','address','address_additional','postal_code','type'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
