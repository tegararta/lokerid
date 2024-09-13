<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama');
            $table->string('pelatihan');
            $table->string('lokasi');
            $table->string('deskripsi');
            $table->string('hari');
            $table->string('jenis');
            $table->string('ruangan');
            $table->string('foto');
            $table->time('start'); // Menambahkan kolom untuk menyimpan jam
            $table->time('end');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};
