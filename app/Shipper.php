<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shipper';

//    public function getTransactionRelation(){
//        return $this->hasMany('App\Transaction', 'shipper_id', 'id');
//    }
}
