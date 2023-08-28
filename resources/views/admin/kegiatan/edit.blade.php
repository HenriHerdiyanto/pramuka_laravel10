@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Edit Kegiatan</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Kegiatan</li>
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
                        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST"
                            enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan"
                                        value="{{ $kegiatan->nama_kegiatan }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tempat" class="form-control" id="tempat"
                                        value="{{ $kegiatan->tempat }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        value="{{ $kegiatan->tanggal }}" required>
                                </div>
                            </div>
                            {{-- keterangan --}}
                            <div class="mb-3 row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Kegiatan</label>
                                <div class="col-sm-10">
                                    <textarea class="tinymce-editor" name="keterangan" rows="5" required>{{ $kegiatan->keterangan }}</textarea>
                                    {{-- <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required></textarea> --}}
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status Kegiatan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected value="{{ $kegiatan->status }}">{{ $kegiatan->status }}</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto" class="form-control" id="foto">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('kegiatan_fotos/' . $kegiatan->foto) }}" alt=""
                                        width="200px">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
