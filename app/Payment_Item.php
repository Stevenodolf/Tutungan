<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_Item extends Model
{
    protected $table = 'payment_item';
    
    public function getTransactionRelation(){
        return $this->hasOne('App\Payment', 'id', 'payment_id');
    }

    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }

    public function getShipperRelation(){
        return $this->hasOne('App\Shipper', 'id', 'shipper_id');
    }
}
