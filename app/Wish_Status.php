<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish_Status extends Model
{
    protected $table = 'wish_status';

    public function getWishRelation(){
        return $this->hasMany('App\Wish', 'status_id', 'id');
    }
}
