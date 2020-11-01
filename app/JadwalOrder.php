<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalOrder extends Model
{
    protected $table = "jadwal_order";
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'nik', 'no_kontrak', 'tgl_jadwal', 'tgl_order', 'harga_barang', 'pinjaman_awal', 'pinjaman_disetujui', 'tenor', 'angsuran', 'adm', 'stnk', 'bpkb_depan', 'bpkb_belakang', 'kwt_jb', 'mtr_dpn', 'mtr_blkng', 'mtr_kanan', 'mtr_kiri', 'nosin', 'noka', 'selfie', 'status', 'pembatalan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
