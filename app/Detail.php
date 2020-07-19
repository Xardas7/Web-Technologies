<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

    protected $fillable = ['material','composition','width','height','depth','weight','quantity'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
