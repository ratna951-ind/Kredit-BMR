<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kios extends Model
{
    protected $table = "kios";
    public $timestamps = false;

    protected $primaryKey = 'kode';

    protected $fillable = [
        'kode', 'nama', 'bank', 'alamat', 'aktif'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'kode_kios', 'kode');
    }

    public function kas_bank()
    {
        return $this->hasMany(KasBank::class, 'kode_kios', 'kode');
    }
}
