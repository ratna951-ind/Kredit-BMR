<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kios extends Model
{
    protected $table = "kios";
    public $timestamps = false;

    protected $fillable = [
        'kode', 'nama', 'aktif'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
