<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Beranda;
use App\Models\KategoriMember;
use App\Models\Kegiatan;
use App\Models\News;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriMember::all();
        $news = News::all();
        $kegiatan = Kegiatan::latest()->first();
        $latestPengumuman = Pengumuman::latest()->first();
        $barangs = Barang::take(3)->get();
        return view('beranda.index', compact('kategori', 'latestPengumuman', 'news', 'kegiatan', 'barangs'));
    }


    // buatkan function pengumumanDetail
    public function pengumumanDetail($id)
    {
        // panggil semua data yang ada di tabel pengumumen
        $SemuaPengumuman = Pengumuman::all();
        $pengumuman = Pengumuman::find($id); // Fetch the pengumuman
        $barangs = Barang::all(); // Fetch the barangs
        return view('beranda.pengumuman-detail', compact('pengumuman', 'barangs', 'SemuaPengumuman'));
    }

    public function beritaDetail($id)
    {
        $news = News::find($id);
        $allNews = News::all();
        return view('beranda.berita-detail', compact('news', 'allNews'));
    }

    public function kegiatanDetail($id)
    {
        $kegiatan = Kegiatan::find($id);
        $allkegiatan = Kegiatan::all();
        return view('daftar.kegiatan-detail', compact('kegiatan', 'allkegiatan'));
    }
}
