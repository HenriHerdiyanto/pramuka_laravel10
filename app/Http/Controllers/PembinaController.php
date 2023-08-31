<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembinas = Pembina::all();
        return view('pembina.index', compact('pembinas'));
    }

    // PembinaAdmin
    public function PembinaAdmin()
    {
        $pembinas = Pembina::all();
        return view('admin.pembina.index', compact('pembinas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembina.create');
    }

    public function konfirmasi()
    {
        return view('pembina.konfirmasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDASI DARI FORM
        $request->validate([
            'nama_ambalan' => 'required',
            'no_hp' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $pembinas = new Pembina;
        $pembinas->nama_ambalan = $request['nama_ambalan'];
        $pembinas->no_hp = $request['no_hp'];
        $pembinas->jenis = $request['jenis'];
        $pembinas->keterangan = $request['keterangan'];
        $pembinas->save();

        return redirect()->route('pembina.konfirmasi')->with('success', 'Pembina berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembina $pembina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembinas = Pembina::find($id);
        return view('admin.pembina.edit', compact('pembinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // VALIDASI DARI FORM
        $request->validate([
            'nama_ambalan' => 'required',
            'nama_pengajar' => 'required',
            'no_hp' => 'required',
            'surat' => 'file|mimes:pdf,doc,docx|max:2048',
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        // upload dokumen
        if ($request->hasFile('surat')) {
            $file = $request->file('surat');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'surat_pembina';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload dokumen');
        }

        $pembinas = Pembina::find($id);
        $pembinas->nama_ambalan = $request['nama_ambalan'];
        $pembinas->nama_pengajar = $request['nama_pengajar'];
        $pembinas->no_hp = $request['no_hp'];
        $pembinas->surat = $nama_file;
        $pembinas->jenis = $request['jenis'];
        $pembinas->keterangan = $request['keterangan'];
        $pembinas->save();

        // kembali ke halaman admin pembina index
        return redirect()->route('pembina-admin')->with('success', 'Pembina berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembinas = Pembina::find($id);
        $pembinas->delete();

        return redirect()->route('pembina-admin')->with('success', 'Pembina berhasil dihapus');
    }
}
