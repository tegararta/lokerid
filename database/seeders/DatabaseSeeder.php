<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menambahkan seeder LokerSeeder
        $this->call([
            LokerSeeder::class,
        ]);

        // Contoh seeder lain yang bisa ditambahkan
        // $this->call([
        //     UserSeeder::class,
        // ]);
    }
}
