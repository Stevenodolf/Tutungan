<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_Kecamatan extends Model
{
    protected $table = 'address_kecamatan';

    public function getKabupatenRelation(){
        return $this->hasOne('App\Address_Kabupaten', 'id', 'kabupaten_id');
    }
}
