<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }
}
