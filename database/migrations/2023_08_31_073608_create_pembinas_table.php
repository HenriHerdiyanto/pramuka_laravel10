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
        Schema::create('pembinas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ambalan')->nullable();
            $table->string('nama_pengajar')->nullable();
            $table->string('no_hp')->nullable();
            // upload surat boleh kosong/boleh tidak di input
            $table->string('surat')->nullable();
            // enum pelatih atau pembina
            $table->enum('jenis', ['pelatih', 'pembina'])->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembinas');
    }
};
