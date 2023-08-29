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
    <!-- End Page Title -->
    <!-- Start Post -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="container mt-5 mb-2">
                                {{-- kegiatan_id --}}
                                <div class="mb-3 row">
                                    <label for="kegiatan_id" class="col-sm-2 col-form-label">Kegiatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="kegiatan_id" id="kegiatan_id" required>
                                            <option selected disabled value="">Pilih Kegiatan</option>
                                            @foreach ($kegiatan as $kegiatan)
                                                <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Nama --}}
                                <div class="mb-3 row">
                                    <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Laporan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan"
                                            required>
                                    </div>
                                </div>
                                {{-- tanggal --}}
                                <div class="mb-3 row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                                    </div>
                                </div>
                                {{-- dokumen --}}
                                <div class="mb-3 row">
                                    <label for="dokumen" class="col-sm-2 col-form-label">Dokumen</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="dokumen" class="form-control" id="dokumen" required>
                                    </div>
                                </div>
                                {{-- tombol --}}
                                <div class="mb-3 row">
                                    <label for="dokumen" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
