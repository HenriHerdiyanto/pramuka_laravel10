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
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->nullable();
            $table->string('nama_ambalan')->nullable();
            $table->string('nama_pembina')->nullable();
            $table->string('jumlah_putra')->nullable();
            $table->string('jumlah_putri')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->string('bukti_transfer')->nullable();
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
