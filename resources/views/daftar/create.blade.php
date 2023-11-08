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
                    <h6 class="mb-0">Pendaftaran</h6>
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Kegiatan Details</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li><small>* Pastikan anda sudah melakukan transfer biaya pendaftaran ke (No.Rek 123456789) sebesar
                            ( {{ $selectedKegiatan->biaya_pendaftaran }} )</small></li>
                    <li><small>* Pastikan anda melampirkan bukti pembayaran</small></li>
                    <li><small>* Pastikan data yang anda masukkan benar</small></li>
                    <li><small>* Pastikan anda sudah mengupload surat sekolah yang resmi</small></li>
                </ul>
            </div>
        </div>
    </div><br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Input text</label>
                        {{-- <input type="text" class="form-control" id="kegiatan_id" name="kegiatan_id"
                            value="{{ $kegiatan->id }}" placeholder="{{ $kegiatan->nama_kegiatan }}" readonly> --}}
                        {{-- select --}}
                        <select class="form-select" aria-label="Default select example" name="kegiatan_id" @readonly(true)
                            required>
                            {{-- <option selected>--- Pilih Satuan ---</option> --}}
                            @foreach ($kegiatans as $kegiatan)
                                <option value="{{ $kegiatan->id }}"
                                    {{ $selectedKegiatan && $selectedKegiatan->id == $kegiatan->id ? 'selected' : '' }}>
                                    {{ $kegiatan->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- nama_ambalan --}}
                    <div class="form-group">
                        <label for="nama_ambalan">Nama Ambalan</label>
                        <input type="text" class="form-control" name="nama_ambalan">
                    </div>
                    {{-- nama pembina --}}
                    <div class="form-group">
                        <label for="nama_pembina">Nama Pembina</label>
                        <input type="text" class="form-control" name="nama_pembina">
                    </div>
                    {{-- jumlah_putra --}}
                    <div class="form-group">
                        <label for="jumlah_putra">Jumlah Putra</label>
                        <input type="number" class="form-control" name="jumlah_putra">
                    </div>
                    {{-- jumlah_putri --}}
                    <div class="form-group">
                        <label for="jumlah_putri">Jumlah Putri</label>
                        <input type="number" class="form-control" name="jumlah_putri">
                    </div>
                    {{-- nama_peserta --}}
                    <div class="from-group mb-2">
                        <label for="nama_peserta">Nama Peserta Putra & Putri (.pdf Sekolah)</label>
                        {{-- <input type="file" class="form-control" name="nama_peserta"> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="file-upload-card">
                                    <svg class="bi bi-file-earmark-arrow-up text-primary" width="48" height="48"
                                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z">
                                        </path>
                                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"></path>
                                        <path fill-rule="evenodd"
                                            d="M8 12a.5.5 0 0 0 .5-.5V7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 7.707V11.5a.5.5 0 0 0 .5.5z">
                                        </path>
                                    </svg>
                                    <h5 class="mt-2 mb-4">Upload your files</h5>
                                    <div class="form-file">
                                        <input class="form-control d-none" id="customFile" name="nama_peserta"
                                            type="file">
                                        <label class="form-file-label justify-content-center" for="customFile">
                                            <span class="form-file-button btn btn-primary shadow w-100">Upload File</span>
                                        </label>
                                    </div>
                                    <h6 class="mt-4 mb-0">Perhatikan</h6>Surat dari sekolah dan TTD kepala sekolah
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- bukti_transfer --}}
                    <div class="form-group mt-2">
                        <label for="bukti_transfer">Bukti Transfer</label>
                        <input type="file" class="form-control" name="bukti_transfer">
                    </div>
                    <div class="form-group">
                        <label for="biaya_pendaftaran">Biaya Pendaftaran</label>
                        <input type="text" class="form-control" value="{{ $selectedKegiatan->biaya_pendaftaran }}"
                            readonly>
                    </div>
                    <div class="mb-3 row">
                        <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div><br>
@endsection
