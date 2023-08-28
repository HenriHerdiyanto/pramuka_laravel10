@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <h1>Edit Pengumuman</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Edit Pengumuman</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pengumuman.update', $pengumumen->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        value="{{ $pengumumen->judul }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="isi" class="col-sm-2 col-form-label">Isi Pengumuman</label>
                                <div class="col-sm-10">
                                    <textarea class="tinymce-editor" name="isi" rows="5" required>{{ $pengumumen->isi }}</textarea>
                                    {{-- <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required></textarea> --}}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="penulis" class="col-sm-2 col-form-label">Nama Penulis</label>
                                <div class="col-sm-10">
                                    <input type="text" name="penulis" class="form-control" id="penulis"
                                        value="{{ $pengumumen->penulis }}" required>
                                </div>
                            </div>
                            {{-- tanggal --}}
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        value="{{ $pengumumen->tanggal }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kategori" class="form-control" id="kategori"
                                        value="{{ $pengumumen->kategori }}" required>
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    {{-- SELECT OPTION aktif atau tidak aktif --}}
                                    <select class="form-select" aria-label="Default select example" name="status" required>
                                        <option selected value="{{ $pengumumen->status }}">{{ $pengumumen->status }}
                                        </option>
                                        <option value="aktif" {{ $pengumumen->status == 'aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="tidak aktif"
                                            {{ $pengumumen->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="mb-3 row">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="file" name="gambar" class="form-control" id="gambar">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('pengumuman_fotos/' . $pengumumen->gambar) }}" class="img-fluid"
                                        alt="Responsive image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary mb-4 text-end">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
