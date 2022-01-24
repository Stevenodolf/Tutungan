<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification_Wish extends Model
{
    protected $table = 'notification_wish';

    public function getNotificationRelation(){
        return $this->hasOne('App\Notification', 'id', 'notification_id');
    }

    public function getWishRelation(){
        return $this->hasOne('App\Wish', 'id', 'wish_id');
    }

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getTransactionRelation(){
        return $this->hasOne('App\Transaction', 'id', 'transaction_id');
    }
}
