<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_Kabupaten extends Model
{
    protected $table = 'address_kabupaten';

    public function getProvinsiRelation(){
        return $this->hasOne('App\Address_Provinsi', 'id', 'provinsi_id');
    }
}
