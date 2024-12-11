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
        Schema::create('jadwal_suntik_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('namaPasien');
            $table->string('noTelepon');
            $table->date('tanggalSuntik');
            $table->date('tanggalPengingat');
            $table->string('jadwalPengingat');
            $table->string('jenisPengingat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_suntik_kbs');
    }
};
