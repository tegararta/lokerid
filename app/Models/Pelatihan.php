<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function daftarpelatihan()
    {
        return $this->hasMany(Daftarpelatihan::class, 'id_pelatihan');
    }

    public function instrukturs()
    {
        return $this->hasMany(Instruktur::class, 'id_pelatihan');
    }
}
