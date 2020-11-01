<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $table = "konsumen";
    protected $primaryKey = 'nik';

    public $timestamps = false;

    protected $fillable = [
        'nik', 'nama', 'tmptlahir', 'tgllahir', 'alamatktp', 'alamatsekarang', 'telp', 'jk', 'ibukandung', 'status', 'statusrumah', 'lamamenetapbulan', 'pendidikanterakhir', 'nama_2', 'tmptlahir_2', 'tgllahir_2', 'gambarktp', 'gambarkk', 'gambarktp_2'
    ];
}
