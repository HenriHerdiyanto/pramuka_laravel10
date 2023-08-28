<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumumen';
    protected $fillable = [
        'judul',
        'isi',
        'penulis',
        'tanggal',
        'kategori',
        'status',
        'gambar',
    ];
}
