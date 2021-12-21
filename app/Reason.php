<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'reason';

    public function getWishRelation(){
        return $this->hasMany('App\Wish', 'reason_id', 'id');
    }
}
