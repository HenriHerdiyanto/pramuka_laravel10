@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <h1>Members</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Members</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>


    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="row">
                        {{-- munculkan alert data berhasil dihapus --}}
                        @if (session('hapus'))
                            <div class="alert alert-danger col-lg-12">
                                {{ session('hapus') }}
                            </div>
                        @endif
                        {{-- munculkan alert data berhasil ditambahkan --}}
                        @if (session('success'))
                            <div class="alert alert-success col-lg-12">
                                {{ session('success') }}
                            </div>
                        @endif
                        @foreach ($kategoriMembers as $kategoriMember)
                            <div class="col-lg-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <img style="width: 100%;" class="img-fluid"
                                                    src="{{ asset('kategori_fotos/' . $kategoriMember->foto) }}"
                                                    alt="">
                                            </div>
                                            <div class="ps-3">
                                                <span class="text-success small pt-1 fw-bold">Pramuka</span>
                                                <span class="text-muted small pt-2 ps-1">{{ $kategoriMember->nama }}</span>
                                                {{-- hapus --}}
                                                <form class="d-flex"
                                                    action="{{ route('kategori.destroy', $kategoriMember->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- button edit --}}
                                                    <a href="{{ route('kategori.edit', $kategoriMember->id) }}"
                                                        class="btn btn-sm btn-outline-primary flex-grow-1 w-50">Edit</a>
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger ml-2 w-50">Hapus</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
