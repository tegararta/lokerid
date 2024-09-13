<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMember extends Model
{
    use HasFactory;

    protected $table = 'nilai_members';

    protected $fillable = [
        'id_pelatihan',
        'id_member',
        'jenispelatihan',
        'kelas',
        'nilai',
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }
}
