<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'berita';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }

        $news = new News;
        $news->judul = $validatedData['judul'];
        $news->penulis = $validatedData['penulis'];
        $news->isi = $validatedData['isi'];
        $news->tanggal = $validatedData['tanggal'];
        $news->status = $validatedData['status'];
        $news->foto = $nama_file;
        $news->save();

        return redirect()->route('news')->with('success', 'News berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);

        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'berita';
            $file->move(public_path($tujuan_upload), $nama_file);
            $news->foto = $nama_file;
        }

        $news->judul = $validatedData['judul'];
        $news->penulis = $validatedData['penulis'];
        $news->isi = $validatedData['isi'];
        $news->tanggal = $validatedData['tanggal'];
        $news->status = $validatedData['status'];
        $news->save();

        return redirect()->route('news')->with('success', 'News berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
