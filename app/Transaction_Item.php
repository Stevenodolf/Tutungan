<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_Item extends Model
{
    protected $table = 'transaction_item';
    
    public function getTransactionRelation(){
        return $this->hasOne('App\Transaction', 'id', 'transaction_id');
    }

    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }

    public function getShipperRelation(){
        return $this->hasOne('App\Shipper', 'id', 'shipper_id');
    }
}
