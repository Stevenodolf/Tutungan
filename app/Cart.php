<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function getCartItemRelation(){
        return $this->hasMany('App\Cart_Item', 'cart_id', 'id');
    }
}
