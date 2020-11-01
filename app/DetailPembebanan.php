<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembebanan extends Model
{
    protected $table = "detail_pembebanan";
    public $timestamps = false;

    protected $fillable = [
        'order_id', 'pembayaranke', 'notransaksi', 'tgl_bayar'
    ];
}
