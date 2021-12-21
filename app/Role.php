<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public function getUserRelation(){
        return $this->hasMany('App\User', 'role_id', 'id');
    }
}
