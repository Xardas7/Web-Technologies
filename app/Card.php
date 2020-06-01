<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $hidden = [
        //'cvv'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
