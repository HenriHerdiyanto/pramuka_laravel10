@extends('layouts.user')
@section('content')
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Paste your Header Content from here -->
            <!-- Header Content -->
            <div class="header-content position-relative d-flex align-items-center justify-content-between">
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
                    <h6 class="mb-0">All Pengumuman</h6>
                </div>
                <!-- Settings -->
                <div class="setting-wrapper">
                    <div class="setting-trigger-btn" id="settingTriggerBtn">
                        <svg class="bi bi-gear" width="18" height="18" viewBox="0 0 16 16"
                            fill="url(#gradientSettings)" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradientSettings" spreadMethod="pad" x1="0%" y1="0%"
                                    x2="100%" y2="100%">
                                    <stop offset="0" style="stop-color: #0134d4; stop-opacity:1;"></stop>
                                    <stop offset="100%" style="stop-color: #28a745; stop-opacity:1;"></stop>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd"
                                d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z">
                            </path>
                        </svg><span></span>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- Service Card -->
    <div class="container">
        <div class="card">
            @foreach ($pengumumen as $data)
                <!-- Single Blog Card -->
                <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                    <div class="card shadow-sm blog-list-card p-2">
                        <div class="d-flex align-items-center">
                            <div class="card-blog-img position-relative"
                                style="background-image: url('{{ asset('pengumuman_fotos/' . $data->gambar) }}')">
                                <span
                                    class="badge bg-warning text-dark position-absolute card-badge">{{ $data->status }}</span>
                            </div>
                            <div class="card-blog-content">
                                <span class="badge bg-danger rounded-pill mb-2 d-inline-block">
                                    {{ $data->tanggal }}
                                </span>
                                <a class="blog-title d-block mb-3 text-dark" href="page-blog-details.html">
                                    {{ $data->judul }}
                                </a>
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('pengumuman-detail', ['id' => $data->id]) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><br>
    <div class="container">
        <div class="card related-product-card direction-rtl mb-5">
            <div class="card-header">
                <h5 class="mb-3 text-center">Kelengkapan Pramuka</h5>
            </div>
            <div class="card-body">
                <div class="row g-3 d-flex justify-content-center">
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
    </div>
@endsection
