<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'wish';

    public function getCategoryRelation(){
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getCreatedByRelation(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function getStatusWishRelation(){
        return $this->hasOne('App\Status_Wish', 'id', 'status_wish_id');
    }

    public function getStatusTransaksiRelation(){
        return $this->hasOne('App\Status_Transaksi', 'id', 'status_transaksi_id');
    }
    
    public function getApprovedByRelation(){
        return $this->hasOne('App\User', 'id', 'approved_by');
    }

    public function getReasonRelation(){
        return $this->hasOne('App\Reason', 'id', 'reason_id');
    }
}
