@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <h1>Add Members</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Add Members</li>
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
                        <form action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Pilih Satuan Kerja</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="kategori_id"
                                        required>
                                        <option selected>--- Pilih Satuan ---</option>
                                        @foreach ($kategoriMembers as $user)
                                            <option value="{{ $user->id }}">{{ $user->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="nama" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ambalan" class="col-sm-2 col-form-label">Asal Ambalan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ambalan" class="form-control" id="ambalan" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="golongan_darah" class="col-sm-2 col-form-label">Golongan Darah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="golongan_darah" class="form-control" id="golongan_darah"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto" class="form-control" id="foto" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="{{ route('member') }}" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
