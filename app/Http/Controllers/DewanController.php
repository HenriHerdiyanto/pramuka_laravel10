<?php

namespace App\Http\Controllers;

use App\Models\KategoriMember;
use App\Models\Member;
use Illuminate\Http\Request;

class DewanController extends Controller
{
    public function index()
    {
        $kategoriMembers = KategoriMember::all();
        return view('dewan.index', compact('kategoriMembers'));
        // dd($kategoriMembers);
    }
    // dewanDetail
    public function dewanDetail($kategori_id)
    {
        // munculkan data members yang kategori_id nya sama dengan id pada tabel kategori_members
        $kategoriMembers = Member::where('kategori_id', $kategori_id)->get();
        // dd($kategoriMembers);
        return view('dewan.dewan-detail', compact('kategoriMembers'));
    }
}
