<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;
    protected $table = 'pembinas';
    protected $fillable = [
        'nama_ambalan',
        'nama_pengajar',
        'no_hp',
        'surat',
        'jenis',
        'keterangan',
    ];
}
