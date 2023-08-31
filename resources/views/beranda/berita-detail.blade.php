@extends('layouts.user')
@section('content')
    <!-- Header Area -->
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
                    <h6 class="mb-0">Detail Berita</h6>
                </div>
                <!-- Navbar Toggler -->
                <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas"
                    data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas"><span class="d-block"></span><span
                        class="d-block"></span><span class="d-block"></span></div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="card image-gallery-card direction-rtl">
                <div class="card-body">
                    <img class="mb-3 rounded" src="{{ asset('berita/' . $news->foto) }}" alt="">
                    <h5>{{ $news->judul }}</h5>
                    <p>{{ $news->isi }}</p>
                    <small>Penulis : {{ $news->penulis }} || {{ $news->tanggal }}</small>
                    {{-- <a class="btn btn-primary mb-4" href="#">Get A Quote</a> --}}
                    <div class="gallery-img mb-3" id="filterContainer">
                        <!-- Gallery Image --><a class="single-gallery-item" href="img/bg-img/4.jpg"><img
                                src="img/bg-img/4.jpg" alt="">
                            <!-- Fav Icon -->
                            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div>
                        </a>
                        <!-- Gallery Image --><a class="single-gallery-item" href="img/bg-img/5.jpg"><img
                                src="img/bg-img/5.jpg" alt="">
                            <!-- Fav Icon -->
                            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div>
                        </a>
                        <!-- Gallery Image --><a class="single-gallery-item" href="img/bg-img/6.jpg"><img
                                src="img/bg-img/6.jpg" alt="">
                            <!-- Fav Icon -->
                            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div>
                        </a>
                        <!-- Gallery Image --><a class="single-gallery-item" href="img/bg-img/7.jpg"><img
                                src="img/bg-img/7.jpg" alt="">
                            <!-- Fav Icon -->
                            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <!-- Single Counter -->
                            <div class="single-counter-wrap text-center mb-4"><i class="bi bi-basket mb-2 text-success"></i>
                                <h3 class="mb-0 text-success"><span class="counter">1400</span>+</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <!-- Single Counter -->
                            <div class="single-counter-wrap text-center mb-4"><i class="bi bi-cup mb-2 text-primary"></i>
                                <h4 class="mb-0 text-primary"><span class="counter">16</span>k</h4>
                            </div>
                        </div>
                        <div class="col-4">
                            <!-- Single Counter -->
                            <div class="single-counter-wrap text-center mb-4"><i
                                    class="bi bi-emoji-smile mb-2 text-danger"></i>
                                <h3 class="mb-0 text-danger"><span class="counter">963</span>+</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            @foreach ($allNews as $item)
                                <div class="card shadow-sm blog-list-card mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="card-blog-img position-relative"
                                            style="background-image: url('{{ asset('berita/' . $item->foto) }}');">
                                            <span
                                                class="badge bg-warning text-dark position-absolute card-badge">{{ $item->status }}</span>
                                        </div>

                                        <div class="card-blog-content">
                                            <span
                                                class="badge bg-danger rounded-pill mb-2 d-inline-block">{{ $item->tanggal }}</span>
                                            <a class="blog-title d-block mb-3 text-dark" href="page-blog-details.html">The
                                                {{ $item->judul }}
                                            </a>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('berita-detail', ['id' => $item->id]) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
