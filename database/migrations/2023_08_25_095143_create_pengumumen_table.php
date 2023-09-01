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
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();
            $table->string('penulis')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('kategori')->nullable();
            // status enum aktif dan tidak aktif
            $table->enum('status', ['aktif', 'tidak aktif'])->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumumen');
    }
};
