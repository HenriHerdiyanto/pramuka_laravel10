@extends('layouts.user')
@section('content')
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Paste your Header Content from here -->
            <!-- Header Content -->
            <div class="header-content position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button -->
                <div class="back-button"><a href="/daftar">
                        <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z">
                            </path>
                        </svg></a></div>
                <!-- Page Title -->
                <div class="page-heading">
                    <h6 class="mb-0">Kegiatan Details</h6>
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
    </div>
    <div class="page-content-wrapper">
        <div class="container">
            <div class="pt-3 d-block"></div>
            <div class="blog-details-post-thumbnail position-relative">
                <img class="w-100 rounded-lg" src="{{ asset('kegiatan_fotos/' . $kegiatan->foto) }}" alt="">
                <a class="post-bookmark position-absolute card-badge" href="#">
                    <i class="bi bi-bookmark"></i>
                </a>
            </div>
        </div>
        <div class="blog-description py-3">
            <div class="container">
                {{-- status jika aktif maka bg-primary jika tidak aktif bg-danger --}}
                @php
                    $status = $kegiatan->status;
                    if ($status == 'aktif') {
                        echo '<a class="badge bg-primary mb-2 d-inline-block" href="#">Status Aktif</a>';
                    } else {
                        echo '<a class="badge bg-danger mb-2 d-inline-block" href="#">Tidak Aktif</a>';
                    }
                @endphp
                {{-- <a class="badge bg-primary mb-2 d-inline-block" href="#">{{ $kegiatan->status }}</a> --}}
                <h3 class="mb-3">{{ $kegiatan->nama_kegiatan }}</h3>
                <div class="d-flex align-items-center mb-4">
                    <span class="ms-2"><i class="bi bi-person-fill"></i> Admin</span>
                </div>
                <p class="fz-14"></p>
            </div>
        </div>
        <!-- All Comments -->
        <div class="rating-and-review-wrapper pb-3 mt-3">
            <div class="container">
                <h6 class="mb-3"></h6>
                {{-- download surat --}}
                <div class="card p-2">
                    <div class="row">
                        <div class="col-6">
                            <h6>Detail Kegiatan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ asset('kegiatan_fotos/' . $kegiatan->surat) }}" class="btn btn-outline-primary"
                                download>Download Surat</a>
                        </div>
                    </div>
                </div><br>
                <div class="card mb-4">
                    <div class="rating-review-content mt-2">
                        <ul class="ps-2">
                            <li class="single-user-review d-flex">
                                <div class="user-thumbnail mt-0"><img src="img/bg-img/2.jpg" alt=""></div>
                                <div class="rating-comment">
                                    <p class="comment mb-1">
                                        {{ $kegiatan->keterangan }}
                                    </p>
                                    <span class="name-date">{{ $kegiatan->tanggal }}</span>
                                </div>
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create', $kegiatan->id) }}"
                            class="btn btn-outline-primary w-100 mb-2">Daftar
                            Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comment Form -->
    </div>
@endsection
