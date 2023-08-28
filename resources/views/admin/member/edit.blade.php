@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <h1>Edit Members</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Edit Members</li>
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
                                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                                        <option selected>--- Pilih Satuan ---</option>
                                        @foreach ($kategoriMembers as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $members->kategori_id) selected @endif>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="nama"
                                        value="{{ $members->name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $members->jabatan }}" name="jabatan"
                                        class="form-control" id="jabatan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ambalan" class="col-sm-2 col-form-label">Asal Ambalan</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $members->ambalan }}" name="ambalan"
                                        class="form-control" id="ambalan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="golongan_darah" class="col-sm-2 col-form-label">Golongan Darah</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $members->golongan_darah }}" name="golongan_darah"
                                        class="form-control" id="golongan_darah">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $members->alamat }}" name="alamat" class="form-control"
                                        id="alamat">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $members->no_hp }}" name="no_hp" class="form-control"
                                        id="no_hp">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{ $members->tgl_lahir }}" name="tgl_lahir"
                                        class="form-control" id="tgl_lahir">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('member_fotos/' . $members->foto) }}" alt="" width="100px"
                                        height="100px">
                                    <input type="file" name="foto" class="form-control" id="foto">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
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
