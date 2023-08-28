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
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama
                            Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    {{-- input gambar --}}
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
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
