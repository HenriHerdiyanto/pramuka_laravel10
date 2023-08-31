@extends('layouts.user')
@section('content')
    <!-- Header Area -->
    <br>
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content -->
            <div
                class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button -->
                <div class="back-button"><a href="/">
                        <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z">
                            </path>
                        </svg></a></div>
                <!-- Page Title -->
                <div class="page-heading">
                    <h6 class="mb-0">Pengumuman Details</h6>
                </div>
                <!-- Navbar Toggler -->
                <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas"
                    data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas"><span class="d-block"></span><span
                        class="d-block"></span><span class="d-block"></span></div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="card product-details-card mb-3">
            <span class="badge bg-warning text-dark position-absolute product-badge"></span>
            <div class="card-body">
                <div class="product-gallery-wrapper">
                    <div class="product-gallery">
                        <a href="{{ asset('pengumuman_fotos/' . $pengumuman->gambar) }}">
                            <img class="rounded" src="{{ asset('pengumuman_fotos/' . $pengumuman->gambar) }}"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card product-details-card mb-3 direction-rtl">
            <div class="card-body">
                <h5>{{ $pengumuman->judul }}</h5>
                <p align="justify">{{ $pengumuman->isi }}</p>
                <small>Kategori : {{ $pengumuman->kategori }}</small>
                <div class="rating-card-two mt-4">
                    <!-- Rating result -->
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <div class="rating">
                            <a href="#">
                                <i class="bi bi-star-fill"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-star-fill"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-star-fill"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-star-fill"></i>
                            </a>
                        </div>
                        <span>{{ $pengumuman->penulis }} || {{ $pengumuman->tanggal }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Blog Card -->
        <div class="card">
            <div class="row">
                @foreach ($SemuaPengumuman as $data)
                    <div class="col-lg-6 col-sm-6">
                        <div class="card shadow blog-list-card p-2">
                            <div class="d-flex align-items-center">
                                <div class="card-blog-img position-relative"
                                    style="background-image: url('{{ asset('pengumuman_fotos/' . $data->gambar) }}')">
                                    <span class="badge bg-warning text-dark position-absolute card-badge">Pengumuman</span>
                                </div>
                                <div class="card-blog-content">
                                    <span
                                        class="badge bg-danger rounded-pill mb-2 d-inline-block">{{ $data->tanggal }}</span>
                                    <a class="blog-title d-block mb-3 text-dark"
                                        href="page-blog-details.html">{{ $data->judul }}</a>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('pengumuman-detail', ['id' => $data->id]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><br>

        <div class="card related-product-card direction-rtl mb-5">
            <div class="card-body">
                <h5 class="mb-3">Kelengkapan Pramuka</h5>
                <div class="row g-3">
                    @foreach ($barangs as $item)
                        <!-- Single Top Product Card -->
                        <div class="col-6 col-sm-4 col-lg-3">
                            <div class="card single-product-card border">
                                <div class="card-body p-3">
                                    <a class="product-thumbnail d-block" href="page-shop-details.html">
                                        <img src="{{ asset('barang_fotos/' . $item->foto) }}" alt="">
                                        <span class="badge bg-primary">Sale</span>
                                    </a>
                                    <a class="product-title d-block text-truncate" href="page-shop-details.html">
                                        {{ $item->nama_barang }}
                                    </a>
                                    <!-- Product Price -->
                                    <p class="sale-price">Rp {{ $item->harga_barang }}</p>
                                    <small>Stok {{ $item->stok_barang }}</small>
                                    <a class="btn btn-danger btn-sm" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div><br>
@endsection
