<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMember extends Model
{
    use HasFactory;

    protected $table = 'kategori_members';

    protected $fillable = [
        'nama',
        'foto'
    ];

    public function members()
    {
        return $this->hasMany(Member::class, 'id');
    }
}
