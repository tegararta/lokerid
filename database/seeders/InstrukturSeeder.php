<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InstrukturSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instrukturs')->insert([
            [
                'id_pelatihan' => 8, // Ganti dengan ID pelatihan yang valid
                'username' => 'instruktur1',
                'password' => bcrypt('password123'), // Pastikan menggunakan bcrypt untuk password
                'nama' => 'Instruktur Pertama',
                'nip' => '1234567890',
                'jeniskelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelatihan' => 9, // Ganti dengan ID pelatihan yang valid
                'username' => 'instruktur2',
                'password' => bcrypt('password123'), // Pastikan menggunakan bcrypt untuk password
                'nama' => 'Instruktur Kedua',
                'nip' => '0987654321',
                'jeniskelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data jika diperlukan
        ]);
    }
}
