<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instruktur extends Authenticatable
{
    
    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }

    public function daftarPelatihan()
    {
        return $this->hasOneThrough(DaftarPelatihan::class, Pelatihan::class, 'id_pelatihan', 'id_daftar_pelatihan', 'id', 'id');
    }

    use Notifiable;

    // Daftar atribut yang dapat diisi secara massal
    protected $fillable = [
        'username', 'nama', 'nip', 'jeniskelamin', 'id_pelatihan', 'password', 'foto'
    ];

    // Atribut yang harus di-hash
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Atribut yang dikembalikan sebagai date
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
