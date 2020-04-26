<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function groups(){
        return $this->belongsToMany('App\Group','user_has_groups');
    }

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
        return $this->belongsToMany('App\Product','wish_lists');
    }

    // Preferences
    public function categories(){
        return $this->hasMany('App\Category','preferences','user_id','category_id');
    }

    public function producers(){
        return $this->hasMany('App\Producer','preferences','user_id','producer_id');
    }

    public function shoppingCart(){
        return $this->hasOne('App\ShoppingCart');
    }
    
    public function address(){
        return $this->belongsTo('App\Address','default_id');
    }
}
