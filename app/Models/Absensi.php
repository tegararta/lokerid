<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'id_member',
        'nama',
        'pelatihan',
        'status'
    ];

    // Relasi ke model DaftarPelatihan
    public function daftarpelatihan()
    {
        return $this->belongsTo(DaftarPelatihan::class, 'id_daftarpelatihan');
    }

    // Relasi ke model Member
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }
}
