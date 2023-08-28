<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumumen = Pengumuman::all();
        // return ke folder pengumuman file index
        return view('admin.pengumuman.index', compact('pengumumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return ke folder pengumuman file create
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data yang diambil dari form
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // menyimpan file gambar ke dalam folder
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'pengumuman_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }

        // menyimpan data ke dalam database
        $pengumumen = new Pengumuman;
        $pengumumen->judul = $validatedData['judul'];
        $pengumumen->isi = $validatedData['isi'];
        $pengumumen->penulis = $validatedData['penulis'];
        $pengumumen->tanggal = $validatedData['tanggal'];
        $pengumumen->kategori = $validatedData['kategori'];
        $pengumumen->status = $validatedData['status'];
        $pengumumen->gambar = $nama_file;
        $pengumumen->save();

        // redirect ke halaman pengumuman
        return redirect('/pengumuman')->with('success', 'Data pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mengambil data pengumuman berdasarkan id
        $pengumumen = Pengumuman::find($id);
        // return ke folder pengumuman file edit
        return view('admin.pengumuman.edit', compact('pengumumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengumumen = Pengumuman::find($id);
        // validasi data yang diambil dari form
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // menyimpan file gambar ke dalam folder
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'pengumuman_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }

        // menyimpan data ke dalam database
        $pengumumen = Pengumuman::find($id);
        $pengumumen->judul = $validatedData['judul'];
        $pengumumen->isi = $validatedData['isi'];
        $pengumumen->penulis = $validatedData['penulis'];
        $pengumumen->tanggal = $validatedData['tanggal'];
        $pengumumen->kategori = $validatedData['kategori'];
        $pengumumen->status = $validatedData['status'];
        $pengumumen->gambar = $nama_file;
        $pengumumen->save();

        // redirect ke halaman pengumuman
        return redirect('/pengumuman')->with('success', 'Data pengumuman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // mengambil data pengumuman berdasarkan id
        $pengumumen = Pengumuman::find($id);
        // menghapus data pengumuman
        $pengumumen->delete();
        // redirect ke halaman pengumuman
        return redirect('/pengumuman')->with('success', 'Data pengumuman berhasil dihapus');
    }
}
