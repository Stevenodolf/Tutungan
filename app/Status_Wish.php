<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Wish extends Model
{
    protected $table = 'status_wish';

    public function getWishRelation(){
        return $this->hasMany('App\Wish', 'status_id', 'id');
    }
}
