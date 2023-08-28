@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Add Berita</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- alert berhasil --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- form --}}
                        <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" id="judul" required>
                                </div>
                            </div>
                            {{-- penulis --}}
                            <div class="mb-3 row">
                                <label for="penulis" class="col-sm-2 col-form-label">Penulis Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" name="penulis" class="form-control" id="penulis" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="isi" rows="5" required></textarea>
                                    {{-- <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required></textarea> --}}
                                </div>
                            </div>
                            {{-- tanggal --}}
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Berita</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status Berita</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="aktif">Publish</option>
                                        <option value="nonaktif">Non aktif</option>
                                    </select>
                                </div>
                            </div>
                            {{-- gambar --}}
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Gambar Berita</label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto" class="form-control" id="foto" required>
                                </div>
                            </div>
                            {{-- button menuju newscontroller news store --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Berita</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
