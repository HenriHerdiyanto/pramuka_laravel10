@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Berita</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Berita</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 text-end"> <!-- Use col-md-6 here -->
                    <a href="{{ route('news.create') }}" class="btn btn-primary"><i class='bx bx-plus'> Add
                            Berita</i></a>
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
                                <h5 class="card-title">All Pengumuman <span>| Today</span></h5>

                                <table class="table table-borderless datatable table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $new)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $new->judul }}</td>
                                                <td>{{ $new->penulis }}</td>
                                                <td>{{ $new->status }}</td>
                                                <td>
                                                    <a href="{{ route('news.edit', $new->id) }}"
                                                        class="btn btn-warning btn-sm"><i class='bx bx-edit'></i></a>
                                                    <form action="{{ route('news.destroy', $new->id) }}" method="POST"
                                                        class="d-inline">
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
