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
            $table->string('name');
            $table->string('jabatan');
            $table->string('ambalan');
            $table->string('golongan_darah');
            $table->string('alamat');
            $table->string('no_hp');
            $table->date('tgl_lahir');
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
