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

    public function getWishStatusRelation(){
        return $this->hasOne('App\Wish_Status', 'id', 'status_id');
    }
    
    public function getApprovedByRelation(){
        return $this->hasOne('App\User', 'id', 'approved_by');
    }

    public function getReasonRelation(){
        return $this->hasOne('App\Reason', 'id', 'reason_id');
    }
}
