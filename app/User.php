<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'email', 'password', 'birth_date', 'sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Groups

    // public function groups(){
    //     return $this->belongsToMany('App\Group','user_has_groups')->withTimeStamps();
    // }

    // General Preferences
    public function generalPreferences(){
        return $this->hasOne('App\GeneralPreferences');
    }

    // Avatar
    public function avatar(){
        return $this->hasOne('App\Avatar')->withDefault();
    }

    // Addresses
    public function addresses(){
        return $this->hasMany('App\Address');
    }

    // Cards
    public function cards(){
        return $this->hasMany('App\Card');
    }

    //Orders
    public function orders(){
        return $this->hasMany('App\Order');
    }

    //Comments
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // A user wishes x Products
    public function wishes(){
        return $this->hasOne('App\WishList');
    }

    // Preferences
    public function categories(){
        return $this->hasMany('App\Category','preferences','user_id','category_id');
    }

    // Producers
    public function producers(){
        return $this->hasMany('App\Producer','preferences','user_id','producer_id');
    }
    // Likes comments
    public function likesComments(){
        return $this->belongsToMany('App\Comment','users_like_comments','user_id','comment_id');
    }
    // Likes Products
    public function likesProducts(){
        return $this->hasMany('App\Product','users_likes_products','user_id','comment_id');
    }
    // Shopping Cart
    public function shoppingCart(){
        return $this->hasOne('App\ShoppingCart');
    }
    // Address
    public function address(){
        return $this->belongsTo('App\Address','default_address');
    }


    // public function isAdmin(){
    //     foreach($this->groups as $group){
    //         if($group->name == 'admin'){
    //             return true;
    //         }
    //     }
    //     return false;
    // }
}
