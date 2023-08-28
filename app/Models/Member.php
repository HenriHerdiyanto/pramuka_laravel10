<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'kategori_id',
        'name',
        'jabatan',
        'ambalan',
        'golongan_darah',
        'alamat',
        'no_hp',
        'tgl_lahir',
        'foto'
    ];
    public function kategoriMembers()
    {
        return $this->belongsTo(KategoriMember::class, 'kategori_id');
    }
}
