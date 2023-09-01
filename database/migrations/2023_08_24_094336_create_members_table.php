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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('members');
            $table->string('name')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('ambalan')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
