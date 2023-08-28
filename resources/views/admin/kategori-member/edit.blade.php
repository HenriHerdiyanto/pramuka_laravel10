@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <h1>Members</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Members</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-3">
        <div class="card-header">
            <h4>Kategories Members</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.update', $kategoriMembers->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama
                            Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $kategoriMembers->nama }}" required>
                        </div>
                    </div>
                    {{-- input gambar --}}
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('kategori_fotos/' . $kategoriMembers->foto) }}" class="img-fluid"
                                style="width: 300px;" alt=""><br>
                            <input type="file" class="form-control" id="foto" name="foto"
                                placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection
