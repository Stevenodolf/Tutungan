<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }

    public function getTransactionStatusRelation(){
        return $this->hasOne('App\Status_Transaksi', 'id', 'status_transaksi_id');
    }

    public function getShipperRelation(){
        return $this->hasOne('App\Shipper', 'id', 'shipper_id');
    }
}
