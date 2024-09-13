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
        Schema::create('daftarpelatihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_member')->references('id')->on('members')->cascadeOnDelete();
            $table->foreignId('id_pelatihan')->references('id')->on('pelatihans')->cascadeOnDelete();
            $table->string('nama');
            $table->string('nik');
            $table->string('ttl');
            $table->string('agama');
            $table->string('alamat');
            $table->string('alamatdom')->nullable();
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('nowa');
            $table->string('usia');
            $table->string('terpadu')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('kelas', ['A', 'B', 'C', 'D']);
            $table->string('status');
            $table->string('klaster');
            $table->string('foto');
            $table->string('pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarpelatihans');
    }
};
