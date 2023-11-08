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
        // ubah nama kolom
        // Schema::table('payrolls', function (Blueprint $table) {
        //     $table->renameColumn('lain-lain', 'lain_lain')->change();
        // });
        // update kolom
        // Schema::table('payrolls', function (Blueprint $table) {
        //     $table->integer('lain-lain')->change();
        // });
        // tambah kolom
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->string('biaya_pendaftaran')->after('nama_kegiatan');
        });
        // //hapus kolom
        Schema::table('daftars', function (Blueprint $table) {
            $table->dropColumn('biaya_pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_kolom');
    }
};
