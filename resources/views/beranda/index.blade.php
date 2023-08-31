@extends('layouts.user')
@section('content')
    <!-- Welcome Toast -->
    <div class="toast toast-autohide custom-toast-1 toast-success home-page-toast" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="7000" data-bs-autohide="true">
        <div class="toast-body">
            <svg class="bi bi-bookmark-check text-white" width="30" height="30" viewBox="0 0 16 16" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z">
                </path>
                <path fill-rule="evenodd"
                    d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z">
                </path>
            </svg>
            <div class="toast-text ms-3 me-2">
                <p class="mb-1 text-white">Welcome to Pramuka PBD</p>
                <small class="d-block">Let's &amp; Start.
                </small>
            </div>
        </div>
        <button class="btn btn-close btn-close-white position-absolute p-1" type="button" data-bs-dismiss="toast"
            aria-label="Close">
        </button>
    </div>
    <!-- Tiny Slider One Wrapper -->
    <div class="tiny-slider-one-wrapper"
        style="background-image: url('{{ asset('assets/img/dkc.png') }}');
        background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="tiny-slider-one">
            <!-- Single Hero Slide -->
            <div>
                <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
                    <div class="h-100 d-flex align-items-center text-center">
                        <div class="container">
                            <h3 class="text-white mb-1">PRAMUKA PAPUA BARAT DAYA</h3>
                            <p class="text-white mb-4">Satyaku Ku Dharmakan, Dharmaku Ku Bhaktikan</p><a
                                class="btn btn-creative btn-warning" href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div>
                <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/33.jpg')">
                    <div class="h-100 d-flex align-items-center text-center">
                        <div class="container">
                            <h3 class="text-white mb-1">KEPERLUAN PRAMUKA</h3>
                            <p class="text-white mb-4">Semua Perlengkapan Prmuka Terlengkap</p><a
                                class="btn btn-creative btn-warning" href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-3"></div>
    <div class="container direction-rtl">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3">
                    {{-- panggil data kategori --}}
                    @foreach ($kategori as $item)
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="{{ route('dewan-detail', $item->id) }}">
                                        <img src="{{ asset('kategori_fotos/' . $item->foto) }}" alt="">
                                    </a>
                                </div>
                                <a href="{{ route('dewan-detail', $item->id) }}">
                                    <p class="mb-0">{{ $item->nama }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- end --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card card-bg-img bg-img bg-overlay mb-3" style="background-image: url('img/bg-img/3.jpg')">
            <div class="card-body direction-rtl p-5">
                <h6 class="text-warning">Pengumuman</h6>
                <h2 class="text-white">{{ $latestPengumuman->judul }}</h2>
                <p class="mb-1 text-white">Kategori : {{ $latestPengumuman->kategori }}</p>
                <p class="mb-4 text-white">Tanggal : {{ $latestPengumuman->tanggal }}</p>
                <a class="btn btn-warning" href="{{ route('pengumuman-detail', ['id' => $latestPengumuman->id]) }}">View
                    Detail</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card service-card bg-info bg-gradient mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="service-text">
                        <h6 class="text-warning">Kegiatan</h6>
                        <h2>{{ $kegiatan->nama_kegiatan }}</h2>
                        <p class="mb-0">{{ $kegiatan->tempat }}</p>
                        <small class="text-white">{{ $kegiatan->tanggal }}</small>
                    </div>
                    <div class="service-img">
                        <a class="btn btn-warning"
                            href="{{ route('kegiatan-detail', ['id' => $kegiatan->id]) }}">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container direction-rtl">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray"><img src="img/demo-img/gulp.png" alt=""></div>
                            <p class="mb-0">Gulp 4</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray"><i class="bi bi-moon text-dark"></i></div>
                            <p class="mb-0">Dark Mode</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray"><i class="bi bi-box-arrow-left text-info"></i></div>
                            <p class="mb-0">RTL Ready</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <h3>Semua Berita</h3>
                <div class="testimonial-slide-three-wrapper">
                    <div class="testimonial-slide3 testimonial-style3">
                        <!-- Single Testimonial Slide -->
                        @foreach ($news as $item)
                            <div class="single-testimonial-slide">
                                <div class="text-content">
                                    <span class="d-inline-block badge bg-warning mb-2">
                                        <i class="bi bi-star-fill me-1">
                                            <a href="{{ route('berita-detail', ['id' => $item->id]) }}">Lihat Berita</a>
                                        </i>
                                    </span>
                                    <h6 class="mb-2">{{ $item->judul }}</h6>
                                    <span class="d-block">Penulis : {{ $item->penulis }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container direction-rtl">
        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray"><i class="bi bi-star text-warning"></i></div>
                            <p class="mb-0">Best Rated</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <svg class="bi bi-award text-success" xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="30" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z">
                                    </path>
                                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mb-0">Elegant</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <svg class="bi bi-lightning-charge text-primary" xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mb-0">Trendsetter</p>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-warning w-100" href="/perlengkapan">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-3"></div>
@endsection
