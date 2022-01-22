<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
    protected $table = 'cart_item';
    protected $fillable = ['cart_id'];

    public function getCartRelation(){
        return $this->hasOne('App\Cart', 'id', 'cart_id');
    }

    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }
}
