<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPreferences extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }
}
