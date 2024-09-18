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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_daftarpelatihan')->references('id')->on('daftarpelatihan')->cascadeOnDelete();
            $table->foreignId('id_member')->references('id')->on('members')->cascadeOnDelete();
            $table->string('nama'); 
            $table->string('pelatihan'); 
            $table->enum('status', ['Hadir', 'Alpha','Izin', 'Absen']);
            $table->timestamps();
        });       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
