<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryFile extends Model
{
    protected $table = 'temporary_files';
    protected $fillable = ['folder', 'filename'];
}
