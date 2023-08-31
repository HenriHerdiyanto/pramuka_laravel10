<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $fillable = [
        'nama_kegiatan',
        'tempat',
        'tanggal',
        'keterangan',
        'status',
        'surat',
        'foto'
    ];

    // relasi dengan tabel laporans
    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
    // relasi dengan tabel pendaftarans
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
