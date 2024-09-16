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
        Schema::create('nilai_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelatihan')->references('id')->on('pelatihans')->restrictOnDelete();
            $table->foreignId('id_member')->references('id')->on('members')->cascadeOnDelete();
            $table->string('jenispelatihan');
            $table->string('kelas');
            $table->string('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_members');
    }
};
