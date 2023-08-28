@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Edit Berita</h1>
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
                        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{--        judul --}}
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        value="{{ $news->judul }}" required>
                                </div>
                            </div>
                            {{--        penulis --}}
                            <div class="mb-3 row">
                                <label for="penulis" class="col-sm-2 col-form-label">Penulis Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" name="penulis" class="form-control" id="penulis"
                                        value="{{ $news->penulis }}" required>
                                </div>
                            </div>
                            {{--        isi --}}
                            <div class="mb-3 row">
                                <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="isi" rows="5" required>{{ $news->isi }}</textarea>
                                </div>
                            </div>
                            {{--        tanggal --}}
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Berita</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        value="{{ $news->tanggal }}" required>
                                </div>
                            </div>
                            {{--        status --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status Berita</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>{{ $news->status }}</option>
                                        <option value="aktif">Publish</option>
                                        <option value="nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar Berita</label>
                                <div class="col-sm-10">
                                    <img class="img-fluid" style="width: 20%" src="{{ asset('berita/' . $news->foto) }}"
                                        alt="">
                                    <input type="file" name="foto" class="form-control" value="{{ $news->foto }}">
                                </div>
                            </div>
                            {{-- tombol --}}
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
