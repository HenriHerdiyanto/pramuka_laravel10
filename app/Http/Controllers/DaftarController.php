<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil data kegiatans
        $kegiatans = Kegiatan::all();
        // panggil data daftars
        $daftars = Daftar::all();
        return view('daftar.index', compact('kegiatans', 'daftars'));
    }

    public function daftarPeserta($id)
    {
        // panggil data dari tabel kegiatans dan tabel daftars berdasarkan id
        $kegiatans = Kegiatan::find($id);
        $daftars = Daftar::where('kegiatan_id', $id)->get();
        return view('daftar.daftar-peserta', compact('kegiatans', 'daftars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $selectedKegiatan = Kegiatan::find($id);
        $kegiatans = Kegiatan::all();
        return view('daftar.create', compact('selectedKegiatan', 'kegiatans'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required',
            'nama_ambalan' => 'required|max:255',
            'nama_pembina' => 'required',
            'jumlah_putra' => 'required',
            'jumlah_putri' => 'required',
            'nama_peserta' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'bukti_transfer' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // upload surat
        if ($request->hasFile('nama_peserta')) {
            $file = $request->file('nama_peserta');
            $nama_file_peserta = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'pendaftaran';
            $file->move(public_path($tujuan_upload), $nama_file_peserta);
        } else {
            return redirect()->back()->with('error', 'Gagal upload surat');
        }
        // upload foto
        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'pendaftaran';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload foto');
        }


        $daftars = new Daftar;
        $daftars->kegiatan_id = $validatedData['kegiatan_id'];
        $daftars->nama_ambalan = $validatedData['nama_ambalan'];
        $daftars->nama_pembina = $validatedData['nama_pembina'];
        $daftars->jumlah_putra = $validatedData['jumlah_putra'];
        $daftars->jumlah_putri = $validatedData['jumlah_putri'];
        $daftars->nama_peserta = $nama_file_peserta;
        $daftars->bukti_transfer = $nama_file;
        $daftars->save();

        return redirect()->route('daftar')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daftar = Daftar::find($id);
        $daftar->delete();
        return redirect()->route('daftar-peserta-admin')->with('success', 'ok');
    }
}
