<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarpelatihan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Mendefinisikan relasi ke model Pelatihan
    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }
}
