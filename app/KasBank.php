<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasBank extends Model
{
    protected $table = "kas_bank";
    public $timestamps = false;

    protected $fillable = [
        'kode_kios', 'order_id', 'cara_bayar', 'bank', 'jenis', 'jumlah', 'sisa', 'tgl', 'bukti_std'
    ];

    public function kios()
    {
        return $this->belongsTo(Kios::class, 'kode_kios', 'kode');
    }

    public function order()
    {
        return $this->belongsTo(JadwalOrder::class);
    }    
}
