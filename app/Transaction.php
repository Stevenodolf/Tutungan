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

    public function getTransactionItemRelation(){
        return $this->hasMany('App\Transaction_Item', 'transaction_id', 'id');
    }

    public function getDomesticShipperRelation(){
        return $this->hasOne('App\Shipper', 'id', 'domestic_shipper_id');
    }

    public function getInterShipperRelation(){
        return $this->hasOne('App\Shipper', 'id', 'inter_shipper_id');
    }

    public function getAddressRelation(){
        return $this->hasOne('App\Address', 'id', 'address_id');
    }
}
