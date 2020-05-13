<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','product_id','content','vote'];

    // User who wrote the comment

    public function user(){
        return $this->belongsTo('App\User');
    }

    // Product's comments

    public function product(){
        return $this->belongsTo('App\Comment');
    }

    public function likes(){
        return $this->hasMany('App\User','users_likes_comments','comment_id','user_id');
    }
}
