<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsumenPekerjaan extends Model
{
    protected $table = "konsumen_pekerjaan";
    protected $primaryKey = 'nik';

    public $timestamps = false;

    protected $fillable = [
        'nik', 'tipe', 'perusahaan', 'masakerja', 'alamat', 'telp', 'jabatan', 'penghasilan', 'perusahaan_2', 'alamat_2', 'telp_2', 'jabatan_2', 'penghasilan_2'
    ];
}
