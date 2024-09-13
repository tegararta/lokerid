<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataMember extends Model
{
    protected $table = 'biodata_members';
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }

    public function daftarPelatihan()
    {
        return $this->hasOneThrough(DaftarPelatihan::class, Member::class, 'id_pelatihan', 'id_daftar_pelatihan', 'id', 'id');
    }

    public function pelatihan()
    {
        return $this->hasManyThrough(
            Pelatihan::class,            // Model target
            DaftarPelatihan::class,      // Model perantara
            'id_member',                 // Foreign key di tabel DaftarPelatihan
            'id_pelatihan',              // Foreign key di tabel Pelatihan
            'id',                        // Local key di tabel BiodataMember
            'id_pelatihan'               // Local key di tabel DaftarPelatihan
        );
    }


    use HasFactory;
}
