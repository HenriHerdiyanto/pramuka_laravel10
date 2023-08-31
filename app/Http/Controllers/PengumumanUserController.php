<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanUserController extends Controller
{
    public function index()
    {
        $pengumumen = Pengumuman::all();
        $barangs = Barang::take(3)->get();
        return view('pengumuman.index', compact('pengumumen', 'barangs'));
    }

    public function perlengkapan()
    {
        $barangs = Barang::all();
        return view('pengumuman.perlengkapan', compact('barangs'));
    }


    public function perlengkapanDetail($id)
    {
        $barang = Barang::findOrFail($id); // Find by ID or throw a 404 error if not found
        return view('pengumuman.perlengkapan-detail', compact('barang'));
    }
}
