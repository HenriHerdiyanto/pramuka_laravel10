@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Permintaan Pembina</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">pembina</li>
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
    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">All Permintaan Pembina <span>| Today</span></h5>
                                <table class="table table-borderless datatable table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Ambalan</th>
                                            <th scope="col">Nama Pengajar</th>
                                            <th scope="col">No Handphone</th>
                                            <th scope="col">Surat</th>
                                            <th scope="col">Jenis Permintaan</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembinas as $new)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $new->nama_ambalan }}</td>
                                                <td>{{ $new->nama_pengajar }}</td>
                                                <td>{{ $new->no_hp }}</td>
                                                <td>
                                                    <a href="{{ asset('surat_pembina/' . $new->surat) }}" target="_blank"
                                                        rel="noopener noreferrer" class="btn btn-sm btn-primary">
                                                        <i class='bi bi-eye'></i>
                                                    </a>
                                                </td>
                                                <td>{{ $new->jenis }}</td>
                                                <td>{{ $new->keterangan }}</td>
                                                <td>
                                                    <a href="{{ route('pembina-admin.edit', ['id' => $new->id]) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class='bx bx-edit'></i>
                                                    </a>

                                                    <form action="{{ route('pembina-admin.destroy', $new->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i
                                                                class='bx bx-trash'></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="col-12 mt-4">
                                    <a href="#" class="btn btn-primary">View all <i class='bx bx-chevron-right'></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
