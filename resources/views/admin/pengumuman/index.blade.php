@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Pengumuman</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Pengumuman</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 text-end"> <!-- Use col-md-6 here -->
                    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary"><i class='bx bx-plus'> Add
                            Pengumuman</i></a>
                </div>
            </div>
        </div>
    </div>
    {{-- alert berhasil --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="section">
        <div class="row">

            <div class="col-lg-8">
                <div class="table-responsive">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">All Pengumuman <span>| Today</span></h5>

                                <table class="table table-borderless datatable table-responsive">
                                    <thead class="table-bordered">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul Pengumuman</th>
                                            <th scope="col">Gambar Pengumuman</th>
                                            <th scope="col">Nama Penulis</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengumumen as $pengumuman)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $pengumuman->judul }}</td>
                                                <td>
                                                    <img style="width: 200px;"
                                                        src="{{ asset('pengumuman_fotos/' . $pengumuman->gambar) }}"
                                                        class="img-fluid" alt="Responsive image">
                                                </td>
                                                <td>{{ $pengumuman->penulis }}</td>
                                                <td>{{ $pengumuman->tanggal }}</td>
                                                <td>{{ $pengumuman->status }}</td>
                                                <td>
                                                    <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}"
                                                        method="post" class="d-inline">
                                                        <a href="{{ route('pengumuman.edit', $pengumuman->id) }}"
                                                            class="btn btn-warning btn-sm"><i class='bx bx-edit'></i></a>

                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                                class='bx bx-trash'></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                    legend: {
                                        data: ['Allocated Budget', 'Actual Spending']
                                    },
                                    radar: {
                                        // shape: 'circle',
                                        indicator: [{
                                                name: 'Sales',
                                                max: 6500
                                            },
                                            {
                                                name: 'Administration',
                                                max: 16000
                                            },
                                            {
                                                name: 'Information Technology',
                                                max: 30000
                                            },
                                            {
                                                name: 'Customer Support',
                                                max: 38000
                                            },
                                            {
                                                name: 'Development',
                                                max: 52000
                                            },
                                            {
                                                name: 'Marketing',
                                                max: 25000
                                            }
                                        ]
                                    },
                                    series: [{
                                        name: 'Budget vs spending',
                                        type: 'radar',
                                        data: [{
                                                value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                name: 'Allocated Budget'
                                            },
                                            {
                                                value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                name: 'Actual Spending'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
