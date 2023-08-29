<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tempat' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'surat' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // upload surat
        if ($request->hasFile('surat')) {
            $file = $request->file('surat');
            $nama_file_surat = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kegiatan_fotos';
            $file->move(public_path($tujuan_upload), $nama_file_surat);
        } else {
            return redirect()->back()->with('error', 'Gagal upload surat');
        }
        // upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kegiatan_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload foto');
        }


        $kegiatan = new Kegiatan;
        $kegiatan->nama_kegiatan = $validatedData['nama_kegiatan'];
        $kegiatan->tempat = $validatedData['tempat'];
        $kegiatan->tanggal = $validatedData['tanggal'];
        $kegiatan->keterangan = $validatedData['keterangan'];
        $kegiatan->status = $validatedData['status'];
        $kegiatan->surat = $nama_file_surat;
        $kegiatan->foto = $nama_file;
        $kegiatan->save();

        return redirect()->route('kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tempat' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kegiatan_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload foto');
        }

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->nama_kegiatan = $validatedData['nama_kegiatan'];
        $kegiatan->tempat = $validatedData['tempat'];
        $kegiatan->tanggal = $validatedData['tanggal'];
        $kegiatan->keterangan = $validatedData['keterangan'];
        $kegiatan->status = $validatedData['status'];
        $kegiatan->foto = $nama_file;
        $kegiatan->save();

        return redirect()->route('kegiatan')->with('success', 'Kegiatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
