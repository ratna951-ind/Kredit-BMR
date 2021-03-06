<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsumenDarurat extends Model
{
    protected $table = "konsumen_darurat";
    protected $primaryKey = 'nik';

    public $timestamps = false;

    protected $fillable = [
        'nik', 'nama_darurat', 'hubungan', 'alamat_darurat', 'telp_darurat'
    ];
}
