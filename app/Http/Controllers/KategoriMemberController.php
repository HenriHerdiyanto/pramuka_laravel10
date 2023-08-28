<?php

namespace App\Http\Controllers;

use App\Models\KategoriMember;
use Illuminate\Http\Request;

class KategoriMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriMembers = KategoriMember::all();
        return view('admin.kategori-member.index', compact('kategoriMembers'));
        // dd($kategoriMembers);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload dan simpan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kategori_fotos';
            $file->move(public_path($tujuan_upload), $nama_file); // Gunakan public_path untuk menentukan direktori tujuan penyimpanan
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }

        // Simpan data ke database
        $kategoriMembers = new KategoriMember;
        $kategoriMembers->nama = $validatedData['nama'];
        $kategoriMembers->foto = $nama_file;
        $kategoriMembers->save();

        // Redirect user kembali ke halaman utama mahasiswa
        return redirect('/kategori')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriMember $kategoriMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoriMembers = KategoriMember::find($id);
        return view('admin.kategori-member.edit', compact('kategoriMembers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategoriMembers = KategoriMember::find($id);

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload dan simpan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kategori_fotos';
            $file->move(public_path($tujuan_upload), $nama_file); // Gunakan public_path untuk menentukan direktori tujuan penyimpanan
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }

        // Perbarui data kategori_members
        $kategoriMembers->nama = $validatedData['nama'];
        $kategoriMembers->foto = $nama_file;
        $kategoriMembers->save();


        // Redirect user kembali ke halaman utama mahasiswa
        return redirect('/kategori')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = KategoriMember::find($id);

        if (!$kategori) {
            return redirect()->back()->withErrors('Kategori tidak ditemukan.');
        }

        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
