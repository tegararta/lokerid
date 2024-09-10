<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LokerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('lokers')->insert([
            [
                'judul' => 'Software Engineer',
                'nama' => 'John Doe',
                'pekerjaan' => 'Pengembang Perangkat Lunak',
                'lokasi' => 'Jakarta',
                'deskripsi' => 'Bertanggung jawab untuk pengembangan aplikasi dan pemeliharaan perangkat lunak.',
                'foto' => 'path/to/image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'UI/UX Designer',
                'nama' => 'Jane Smith',
                'pekerjaan' => 'Desainer Antarmuka dan Pengalaman Pengguna',
                'lokasi' => 'Bandung',
                'deskripsi' => 'Merancang antarmuka pengguna dan meningkatkan pengalaman pengguna.',
                'foto' => 'path/to/image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak entri sesuai kebutuhan
        ]);
    }
}
