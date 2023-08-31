@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <h1>Add Pengumuman</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Add Pengumuman</li>
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
                        <form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" id="judul" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="isi" class="col-sm-2 col-form-label">Isi Pengumuman</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="isi" rows="5" required></textarea>
                                    {{-- <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required></textarea> --}}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="penulis" class="col-sm-2 col-form-label">Nama Penulis</label>
                                <div class="col-sm-10">
                                    <input type="text" name="penulis" class="form-control" id="penulis" required>
                                </div>
                            </div>
                            {{-- tanggal --}}
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kategori" class="form-control" id="kategori" required>
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="status" required>
                                        <option selected>--- Pilih Status ---</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="mb-3 row">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto Pengumuman</label>
                                <div class="col-sm-10">
                                    <input type="file" name="gambar" class="form-control" id="gambar" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="{{ route('member') }}" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
