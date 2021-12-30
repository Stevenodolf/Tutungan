<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }
}
