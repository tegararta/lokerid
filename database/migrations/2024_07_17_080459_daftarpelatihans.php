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
            $table->string('nama');
            $table->string('nik');
            $table->string('ttl');
            $table->string('agama');
            $table->string('alamat');
            $table->string('alamatdom')->nullable();
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('nowa');
            $table->string('terpadu')->nullable();
            $table->string('kelamin');
            $table->string('status');
            $table->string('klaster');
            $table->string('pilihan');
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
