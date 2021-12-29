<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Transaksi extends Model
{
    protected $table = 'status_transaksi';

    public function getWishRelation(){
        return $this->hasMany('App\Wish', 'status_transaksi_id', 'id');
    }
}
