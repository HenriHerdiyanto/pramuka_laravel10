<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- ======= Header ======= -->
                <header id="header" class="header fixed-top d-flex align-items-center">

                    <div class="d-flex align-items-center justify-content-between">
                        <a style="text-decoration: none;" href="index.html" class="logo d-flex align-items-center">
                            <span style="text-decoration: none" class="d-none d-lg-block"><i class="bi bi-snow"></i>
                                PRAMUKA PBD
                            </span>
                            <img class="mx-2" src="{{ asset('Lambang.png') }}" alt="">
                        </a>
                        <i class="bi bi-list toggle-sidebar-btn"></i>
                    </div><!-- End Logo -->

                    <div class="search-bar mr-2">
                        <form class="search-form d-flex align-items-center" method="POST" action="#">
                            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End Search Bar -->

                    <nav class="header-nav navbar-nav ms-auto">
                        <ul class="d-flex align-items-center">

                            <li class="nav-item d-block d-lg-none">
                                <a class="nav-link nav-icon search-bar-toggle " href="#">
                                    <i class="bi bi-search"></i>
                                </a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item ">
                                    <a style="margin-right: 50px;" class="nav-link" href="{{ route('home') }}"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </nav><!-- End Header Nav -->


                </header><!-- End Header -->

                <!-- ======= Sidebar ======= -->
                <aside id="sidebar" class="sidebar">
                    <ul class="sidebar-nav" id="sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="{{ route('home') }}">
                                <i class="bi bi-house-door"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/kategori">
                                <i class="bi bi-gear"></i>
                                <span>Kategori Dewan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/member">
                                <i class="bi bi-person"></i>
                                <span>Member Dewan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/pengumuman">
                                <i class="bi bi-megaphone"></i>
                                <span>Pengumuman</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/pembina-admin">
                                <i class="bi bi-envelope"></i>
                                <span>Permintaan Pembina</span>
                            </a>
                        </li>
                        <div class="dropdown">
                            <a class="nav-link collapsed dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-calendar"></i>
                                <span>Kegiatan</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/kegiatan">Buat Kegiatan</a></li>
                                <li><a class="dropdown-item" href="/laporan">Laporan Kegiatan</a></li>
                                <li><a class="dropdown-item" href="/daftar-peserta-admin">Daftar Peserta</a></li>
                            </ul>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/barang">
                                <i class="bi bi-shop"></i>
                                <span>Shop</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/news">
                                <i class="bi bi-newspaper"></i>
                                <span>Berita</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                {{ __('') }}
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Exit</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li><!-- End Exit Page Nav -->
                    </ul>
                </aside>
            </div>
        </nav>
        <main id="main" class="main">
            @yield('content')
        </main>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
