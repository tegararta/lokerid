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
        Schema::create('infopelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable(); // Path to the uploaded photo
            $table->string('nama');
            $table->string('jabatan');
            $table->string('email');
            $table->string('nip')->unique();
            $table->string('hari');
            $table->time('jam');
            $table->integer('jumlah');
            $table->string('modal'); // Amount with decimal
            $table->string('pelatihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infopelatihans');
    }
};
