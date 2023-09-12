@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Edit Permintaan Pembina</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Pembina</li>
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
                        <form action="{{ route('pembina-admin.update', $pembinas->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{--        judul --}}
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-4 col-lg-2 col-form-label">Nama Ambalan</label>
                                <div class="col-sm-8 col-lg-10">
                                    <input type="text" name="nama_ambalan" class="form-control" id="nama_ambalan"
                                        value="{{ $pembinas->nama_ambalan }}" required>
                                </div>
                            </div>
                            {{--        penulis --}}
                            <div class="mb-3 row">
                                <label for="penulis" class="col-sm-4 col-lg-2 col-form-label">Nama Pengajar</label>
                                <div class="col-sm-8 col-lg-10">
                                    <input type="text" name="nama_pengajar" class="form-control" id="nama_pengajar"
                                        value="{{ $pembinas->nama_pengajar }}" required>
                                </div>
                            </div>
                            {{--        isi --}}
                            <div class="mb-3 row">
                                <label for="isi" class="col-sm-4 col-lg-2 col-form-label">No Handphone</label>
                                <div class="col-sm-8 col-lg-10">
                                    <input type="text" name="no_hp" class="form-control" id="no_hp"
                                        value="{{ $pembinas->no_hp }}" required>
                                </div>
                            </div>
                            {{-- surat file --}}
                            <div class="mb-3 row">
                                <label for="surat" class="col-sm-4 col-lg-2 col-form-label">Surat izin Kwarcab</label>
                                <div class="col-sm-8 col-lg-10">
                                    <div class="input-group">
                                        <input type="file" name="surat" class="form-control" id="surat"
                                            value="{{ $pembinas->surat }}">
                                        <a href="{{ asset('surat_pembina/' . $pembinas->surat) }}"
                                            class="btn btn-info input-group-append">Lihat Surat</a>
                                    </div>
                                </div>
                            </div>

                            {{-- jenis permintaan --}}
                            <div class="mb-3 row">
                                <label for="jenis_permintaan" class="col-sm-4 col-lg-2 col-form-label">Jenis
                                    Permintaan</label>
                                <div class="col-sm-8 col-lg-10">
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="{{ $pembinas->jenis }}">{{ $pembinas->jenis }}</option>
                                        <option value="pelatih">pelatih</option>
                                        <option value="pembina">pembina</option>
                                    </select>
                                </div>
                            </div>
                            {{-- keterangan --}}
                            <div class="mb-3 row">
                                <label for="keterangan" class="col-sm-4 col-lg-2 col-form-label">Keterangan</label>
                                <div class="col-sm-8 col-lg-10">
                                    <textarea class="form-control" name="keterangan" rows="5" required>{{ $pembinas->keterangan }}</textarea>
                                </div>
                            </div>
                            {{-- tombol --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-4 col-lg-2 col-form-label"></label>
                                <div class="col-sm-8 col-lg-10">
                                    <button type="submit" class="btn btn-outline-primary w-100">Perbaharui Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
