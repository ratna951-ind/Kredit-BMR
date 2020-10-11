<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    protected $table = "peran";
    public $timestamps = false;

    protected $fillable = [
        'nama', 'aktif'
    ];
}
