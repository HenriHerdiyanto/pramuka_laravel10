<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // relasi dengan tabel kegiatans
        $laporans = Laporan::with('kegiatan')->get();

        return view('admin.laporan.index', compact('laporans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // relasi dengan tabel kegiatans
        $kegiatan = Kegiatan::all();
        return view('admin.laporan.create', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required',
            'nama_kegiatan' => 'required|max:255',
            'tanggal' => 'required',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // upload dokumen
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'laporan_dokumens';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload dokumen');
        }

        // simpan ke databse
        $laporan = new Laporan;
        $laporan->kegiatan_id = $validatedData['kegiatan_id'];
        $laporan->nama_kegiatan = $validatedData['nama_kegiatan'];
        $laporan->tanggal = $validatedData['tanggal'];
        $laporan->dokumen = $nama_file;
        $laporan->save();

        return redirect()->route('laporan')->with('success', 'Berhasil menambahkan laporan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // relasi dengan tabel kegiatans
        $kegiatan = Kegiatan::all();
        $laporan = Laporan::find($id);
        return view('admin.laporan.edit', compact('laporan', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required',
            'nama_kegiatan' => 'required|max:255',
            'tanggal' => 'required',
            'dokumen' => 'file|mimes:pdf,doc,docx|max:2048',
        ]);

        // upload dokumen
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'laporan_dokumens';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            $nama_file = $request->old_dokumen;
        }

        // Perbarui data
        $laporan = Laporan::find($id);
        $laporan->kegiatan_id = $validatedData['kegiatan_id'];
        $laporan->nama_kegiatan = $validatedData['nama_kegiatan'];
        $laporan->tanggal = $validatedData['tanggal'];
        $laporan->dokumen = $nama_file;
        $laporan->save();

        return redirect()->route('laporan')->with('success', 'Berhasil mengubah laporan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();

        return redirect()->route('laporan')->with('success', 'Berhasil menghapus laporan');
    }
}
