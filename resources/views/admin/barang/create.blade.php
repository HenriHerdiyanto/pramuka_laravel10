@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Add Barang</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Barang</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 text-end"> <!-- Use col-md-6 here -->
                    <a href="{{ route('barang.create') }}" class="btn btn-primary"><i class='bx bx-plus'> Add
                            Barang</i></a>
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
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 row">
                                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="deskripsi_barang" class="col-sm-2 col-form-label">Deskripsi Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="deskripsi_barang" class="form-control" id="deskripsi_barang"
                                        required>
                                </div>
                            </div>
                            {{-- harga --}}
                            <div class="mb-3 row">
                                <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                                <div class="col-sm-10">
                                    <input type="number" name="harga_barang" class="form-control" id="harga_barang"
                                        required>
                                </div>
                            </div>
                            {{-- stok_barang --}}
                            <div class="mb-3 row">
                                <label for="stok_barang" class="col-sm-2 col-form-label">Stok Barang</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stok_barang" class="form-control" id="stok_barang" required>
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto Barang</label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto" class="form-control" id="foto" required>
                                </div>
                            </div>
                            {{-- tombol --}}
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
