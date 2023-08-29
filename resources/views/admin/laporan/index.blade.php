@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Laporan</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Laporan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 text-end"> <!-- Use col-md-6 here -->
                    <a href="{{ route('laporan.create') }}" class="btn btn-primary">
                        <i class='bx bx-plus'> Add Laporan</i>
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
                                <h5 class="card-title">All Laporan <span>| Today</span></h5>

                                <table class="table table-borderless datatable table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Kegiatan</th>
                                            <th scope="col">Nama Laporan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Dokumen</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <?php $no = 0; ?>
                                        @foreach ($laporans as $laporan)
                                            <tr>
                                                <th scope="row">{{ ++$no }}</th>
                                                <td>{{ $laporan->kegiatan->nama_kegiatan }}</td>
                                                <td>{{ $laporan->nama_kegiatan }}</td>
                                                <td>{{ $laporan->tanggal }}</td>
                                                <td>
                                                    <a href="{{ asset('laporan_dokumens/' . $laporan->dokumen) }}"
                                                        target="_blank">Lihat Dokumen</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('laporan.edit', $laporan->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('laporan.destroy', $laporan->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
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
        </div>
    </section>
@endsection
