<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    protected $table = 'user_verify';

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
