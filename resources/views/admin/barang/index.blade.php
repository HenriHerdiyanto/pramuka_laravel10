@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Barang</h1>
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
    <section class="section dashboard">
        <div class="card">
            <div class="container">
                <div class="row">
                    {{-- Munculkan alert data berhasil dihapus --}}
                    @if (session('hapus'))
                        <div class="col-12">
                            <div class="alert alert-danger">
                                {{ session('hapus') }}
                            </div>
                        </div>
                    @endif
                    {{-- Munculkan alert data berhasil ditambahkan --}}
                    @if (session('success'))
                        <div class="col-12">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @foreach ($barang as $item)
                        <div class="col-lg-4 col-md-6 mt-3">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('barang_fotos/' . $item->foto) }}"
                                            class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate">{{ $item->nama_barang }}</h5>
                                            <p class="card-text text-truncate">{{ $item->deskripsi_barang }}</p>
                                            <p class="text-success small pt-1 fw-bold">
                                                Harga Rp.{{ $item->harga_barang }} ||
                                                Stok {{ $item->stok_barang }}
                                            </p>
                                        </div>
                                        <div class="container">
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <a href="{{ route('barang.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm w-100"><i class='bx bx-edit'></i></a>
                                                </div>
                                                <div class="col-6">
                                                    <form class="d-flex" action="{{ route('barang.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm w-100"><i
                                                                class='bx bx-trash'></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
