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
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            // relasi dengan tabel kegiatans
            $table->foreignId('kegiatan_id')->constrained('kegiatans');
            $table->string('nama_ambalan');
            $table->string('nama_pembina');
            $table->string('jumlah_putra');
            $table->string('jumlah_putri');
            $table->string('nama_peserta');
            $table->string('bukti_transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};
