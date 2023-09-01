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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['aktif', 'tidak aktif'])->nullable();
            $table->string('surat')->nullable();
            $table->string('foto')->nullable();
            $table->string('jadwal_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
