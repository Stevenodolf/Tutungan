<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    protected $table = 'origin';

    public function getUserRelation(){
        return $this->hasMany('App\Wish', 'origin_id', 'id');
    }
}
