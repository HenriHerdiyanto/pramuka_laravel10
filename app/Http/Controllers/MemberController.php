<?php

namespace App\Http\Controllers;

use App\Models\KategoriMember;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::with('kategoriMembers')->get();
        return view('admin.member.index', compact('members'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriMembers = KategoriMember::all();
        return view('admin.member.create', compact('kategoriMembers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data yang diambil dari form
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'name' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'ambalan' => 'required|max:255',
            'golongan_darah' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // menyimpan file gambar ke dalam folder img/profile
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'member_fotos';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }
        // update data
        $members = new Member;
        $members->kategori_id = $validatedData['kategori_id'];
        $members->name = $validatedData['name'];
        $members->jabatan = $validatedData['jabatan'];
        $members->ambalan = $validatedData['ambalan'];
        $members->golongan_darah = $validatedData['golongan_darah'];
        $members->alamat = $validatedData['alamat'];
        $members->no_hp = $validatedData['no_hp'];
        $members->tgl_lahir = $validatedData['tgl_lahir'];
        $members->foto = $nama_file;
        $members->save();
        // redirect user ke halaman utama
        return redirect('/member')->with('success', 'Data member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $members = Member::find($id);
        $kategoriMembers = KategoriMember::all();
        return view('admin.member.edit', compact('members', 'kategoriMembers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $members = Member::find($id);

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'name' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'ambalan' => 'required|max:255',
            'golongan_darah' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload dan simpan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'member_fotos';
            $file->move(public_path($tujuan_upload), $nama_file); // Gunakan public_path untuk menentukan direktori tujuan penyimpanan
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }

        // Perbarui data kategori_members
        $members->kategori_id = $validatedData['kategori_id'];
        $members->name = $validatedData['name'];
        $members->jabatan = $validatedData['jabatan'];
        $members->ambalan = $validatedData['ambalan'];
        $members->golongan_darah = $validatedData['golongan_darah'];
        $members->alamat = $validatedData['alamat'];
        $members->no_hp = $validatedData['no_hp'];
        $members->tgl_lahir = $validatedData['tgl_lahir'];
        $members->foto = $nama_file;
        $members->save();

        // Redirect user kembali ke halaman utama
        return redirect('/member')->with('success', 'Data member berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $members = Member::find($id);
        $members->delete();
        return redirect('/member')->with('success', 'Data member berhasil dihapus');
    }
}
