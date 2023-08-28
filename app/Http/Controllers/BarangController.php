<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'deskripsi_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'barang_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload foto');
        }

        $barang = new Barang;
        $barang->nama_barang = $validatedData['nama_barang'];
        $barang->deskripsi_barang = $validatedData['deskripsi_barang'];
        $barang->harga_barang = $validatedData['harga_barang'];
        $barang->stok_barang = $validatedData['stok_barang'];
        $barang->foto = $nama_file;
        $barang->save();

        return redirect()->route('barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('admin.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'deskripsi_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'barang_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload foto');
        }

        $barang->nama_barang = $validatedData['nama_barang'];
        $barang->deskripsi_barang = $validatedData['deskripsi_barang'];
        $barang->harga_barang = $validatedData['harga_barang'];
        $barang->stok_barang = $validatedData['stok_barang'];
        $barang->foto = $nama_file;
        $barang->save();

        return redirect()->route('barang')->with('success', 'Barang berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barang')->with('success', 'Barang berhasil dihapus');
    }
}
