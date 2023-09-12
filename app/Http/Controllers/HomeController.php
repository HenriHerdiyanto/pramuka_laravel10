<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\News;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // panggil data barangs
        $barangs = Barang::all();
        $News = News::all();
        $pengumumen = Pengumuman::all();
        return view('admin.home', compact('barangs', 'News', 'pengumumen'));

        // return view('admin.home');
    }
}
