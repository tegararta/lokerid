<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DaftarPelatihansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daftarpelatihans')->insert([
            'id_member' => 1,  // Asumsikan member dengan ID 1 ada dalam tabel members
            'id_pelatihan' => 8,  // Asumsikan pelatihan dengan ID 1 ada dalam tabel pelatihans
            'nama' => 'John Doe',
            'nik' => '1234567890123456',
            'ttl' => '1990-01-01',
            'agama' => 'Islam',
            'alamat' => 'Jl. Contoh No.1, Kota ABC',
            'alamatdom' => 'Jl. Contoh Domisili No.1, Kota ABC',
            'pendidikan' => 'S1',
            'pekerjaan' => 'Software Engineer',
            'nowa' => '081234567890',
            'terpadu' => 'Program A',
            'kelamin' => 'Laki-laki',
            'status' => 'Belum Menikah',
            'klaster' => 'Disabilitas',
            'pdf' => 'daftarpelatihan/file.pdf',  // Contoh path file PDF
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
