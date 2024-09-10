<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDana extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_pelatihan',
        'jenis_usaha',
        'proposal',
        'status',
        'member_id', // Tambahkan kolom ini
    ];

    // Relasi dengan Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
