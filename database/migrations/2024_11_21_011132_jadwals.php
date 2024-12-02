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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('idpasien');
            $table->string('jenisSuntik');
            $table->string('jadwal');
            $table->date('tanggalSuntik');
            $table->date('tanggalPengingat');
            $table->string('metodePengingat');
            $table->date('tanggalSuntikBerikutnya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
