<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pengajuan_danas', function (Blueprint $table) {
        $table->unsignedBigInteger('member_id')->nullable(); // Menambahkan kolom member_id
        $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade'); // Menambahkan foreign key constraint
    });
}

public function down()
{
    Schema::table('pengajuan_danas', function (Blueprint $table) {
        $table->dropForeign(['member_id']); // Menghapus foreign key constraint
        $table->dropColumn('member_id'); // Menghapus kolom member_id
    });
}

};
