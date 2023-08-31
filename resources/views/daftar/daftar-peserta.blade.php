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
                    <h6 class="mb-0">Daftar Peserta</h6>
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
    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="card invoice-card shadow">
                <div class="card-body">
                    <!-- Download Invoice -->
                    <div class="download-invoice text-end mb-3"><a class="btn btn-sm btn-primary me-2" href="#"><i
                                class="bi bi-file-earmark-pdf me-1"></i>PDF</a><a class="btn btn-sm btn-light"
                            href="#"><i class="bi bi-printer me-1"></i>Print</a></div>
                    <!-- Invoice Info -->
                    <div class="invoice-info text-end mb-4">
                        <h5 class="mb-1 fz-14">{{ $kegiatans->nama_kegiatan }}</h5>
                        <h6 class="fz-12">ID Keg. #{{ $kegiatans->id }}</h6>
                        <p class="mb-0 fz-12">{{ $kegiatans->tanggal }}</p>
                    </div>
                    <!-- Invoice Table -->
                    <div class="invoice-table">
                        <div class="table-responsive">
                            <table class="table table-bordered caption-top">
                                <caption>List of works</caption>
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ambalan</th>
                                        <th>Nama Pembina</th>
                                        <th>Jumlah Putra</th>
                                        <th>Jumlah Putri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftars as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_ambalan }}</td>
                                            <td>{{ $data->nama_pembina }}</td>
                                            <td class="text-center">{{ $data->jumlah_putra }}</td>
                                            <td class="text-center">{{ $data->jumlah_putri }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="mb-0">Notice: This is auto generated invoice.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
