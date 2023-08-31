<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;
    protected $table = 'daftars';
    protected $fillable = [
        'kegiatan_id',
        'nama_ambalan',
        'nama_pembina',
        'jumlah_putra',
        'jumlah_putri',
        'nama_peserta',
        'bukti_transfer'
    ];
    // relasi dengan kegiatans
    public function kegiatans()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
