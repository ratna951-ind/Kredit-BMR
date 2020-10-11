<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'username', 'password', 'kode_kios', 'peran_id', 'aktif'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kios()
    {
        return $this->belongsTo(Kios::class, 'kode_kios', 'kode');
    }

    public function peran()
    {
        return $this->belongsTo(Peran::class);
    }

    public function punyaPeran($peranId)
    {
        if ($this->peran->id == $peranId) return true;
        
        return false;
    }
}
