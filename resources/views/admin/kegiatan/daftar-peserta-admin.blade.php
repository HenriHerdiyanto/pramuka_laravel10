@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Kegiatan</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Kegiatan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 text-end"> <!-- Use col-md-6 here -->
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
                        <i class='bx bx-plus'> Add Kegiatan</i>
                    </a>
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
            <div class="col-lg-8">
                <div class="table-responsive">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">All Kegiatan <span>| Today</span></h5>

                                <table class="table table-borderless datatable table-responsive">

                                    <thead class="table-bordered">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Ambalan</th>
                                            <th scope="col">Pembina</th>
                                            <th scope="col">Putra</th>
                                            <th scope="col">Putri</th>
                                            <th scope="col">Nama Peserta</th>
                                            <th scope="col">Bukti Transfer</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($daftars as $kegiatan)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        {{ $kegiatan->nama_ambalan }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        {{ $kegiatan->nama_pembina }}
                                                    </span>
                                                </td>
                                                <td>{{ $kegiatan->jumlah_putra }}</td>
                                                <td>
                                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        {{ $kegiatan->jumlah_putra }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('pendaftaran/' . $kegiatan->nama_peserta) }}"
                                                        class="btn btn-outline-info w-100" target="_blank">Lihat
                                                        Surat</a>
                                                </td>
                                                <td>
                                                    <img class="img-fluid" style="width: 150px;"
                                                        src="{{ asset('pendaftaran/' . $kegiatan->bukti_transfer) }}"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                                        class="btn btn-warning btn-sm"><i class='bx bx-edit'></i></a>
                                                    <form action="{{ route('peserta-admin.destroy', $kegiatan->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class='bx bx-trash'></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-3">
                        <h5 class="card-title">Pramuka <span>| This Month</span></h5>
                        <img class="img-fluid rounded-3" style="width: 100%;" src="{{ asset('pramuka.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
