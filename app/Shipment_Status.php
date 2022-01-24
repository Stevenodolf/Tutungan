<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment_Status extends Model
{
    protected $table = 'shipment_status';

    public function getTransactionRelation(){
        return $this->hasOne('App\Transaksi', 'id', 'transaction_id');
    }

    public function getSubStatusTransaksiRelation(){
        return $this->hasOne('App\Sub_Status_Transaksi', 'id', 'sub_status_transaksi_id');
    }
}
