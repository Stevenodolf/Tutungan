<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    public function getUserRelation(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getKecamatanRelation(){
        return $this->hasOne('App\Address_Kecamatan', 'id', 'address_kecamatan_id');
    }
}
