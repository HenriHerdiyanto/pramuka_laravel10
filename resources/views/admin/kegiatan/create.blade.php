@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Add Kegiatan</h1>
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
    {{-- form --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 row">
                                <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tempat" class="form-control" id="tempat" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="biaya_pendaftaran" class="col-sm-2 col-form-label">Biaya Pendaftaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="biaya_pendaftaran" class="form-control"
                                        id="biaya_pendaftaran" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                                </div>
                            </div>
                            {{-- keterangan --}}
                            <div class="mb-3 row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Kegiatan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan" rows="5" required></textarea>
                                    {{-- <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required></textarea> --}}
                                </div>
                            </div>
                            {{-- upload surat --}}
                            <div class="mb-3 row">
                                <label for="surat" class="col-sm-2 col-form-label">Upload Surat</label>
                                <div class="col-sm-10">
                                    <input type="file" name="surat" class="form-control" id="surat" required>
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto" class="form-control" id="foto" required>
                                </div>
                            </div>
                            {{-- jadwal_kegiatan --}}
                            <div class="mb-3 row">
                                <label for="jadwal_kegiatan" class="col-sm-2 col-form-label">Jadwal Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="file" name="jadwal_kegiatan" value="aktif" class="form-control"
                                        id="jadwal_kegiatan" required>
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="mb-3 row">
                                {{-- <label for="status" class="col-sm-2 col-form-label">Status Kegiatan</label> --}}
                                <div class="col-sm-10">
                                    <input type="hidden" name="status" value="aktif" class="form-control" id="status"
                                        required>
                                </div>
                            </div>
                            {{-- button --}}
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Kegiatan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
