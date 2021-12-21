<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function getWishRelation(){
        return $this->hasMany('App\Wish', 'category_id', 'id');
    }
}
