@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Edit Barang</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Barang</li>
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
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Nama --}}
                            <div class="mb-3 row">
                                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                        value="{{ $barang->nama_barang }}">
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3 row">
                                <label for="deskripsi_barang" class="col-sm-2 col-form-label">Deskripsi Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="deskripsi_barang" class="form-control" id="deskripsi_barang"
                                        value="{{ $barang->deskripsi_barang }}">
                                </div>
                            </div>
                            {{-- Harga --}}
                            <div class="mb-3 row">
                                <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                                <div class="col-sm-10">
                                    <input type="number" name="harga_barang" class="form-control" id="harga_barang"
                                        value="{{ $barang->harga_barang }}">
                                </div>
                            </div>
                            {{-- Stok --}}
                            <div class="mb-3 row">
                                <label for="stok_barang" class="col-sm-2 col-form-label">Stok Barang</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stok_barang" class="form-control" id="stok_barang"
                                        value="{{ $barang->stok_barang }}">
                                </div>
                            </div>
                            {{-- Foto --}}
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto Barang</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('barang_fotos/' . $barang->foto) }}" class="img-fluid"
                                        style="width: 300px;" alt=""><br>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        placeholder="Masukkan Nama">
                                </div>
                            </div>
                            {{-- button --}}
                            <div class="mb-3 row">
                                <label for="foto_barang" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
