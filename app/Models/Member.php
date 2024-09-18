<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password','sertifikat'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Di model Member
    public function pengajuanDanias()
    {
        return $this->hasMany(PengajuanDana::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_member');
    }

    public function daftarpelatihan()
    {
        return $this->hasMany(Daftarpelatihan::class, 'id_member');
    }

}
