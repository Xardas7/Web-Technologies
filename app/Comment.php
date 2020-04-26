<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // User who wrote the comment

    public function user(){
        return $this->belongsTo('App\User');
    }

    // Product's comments

    public function product(){
        return $this->belongsTo('App\Comment');
    }
}
