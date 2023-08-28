@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <div class="card p-3">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-sm-6"> <!-- Use col-md-6 here -->
                    <h1>Members</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item">Members</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 text-end"> <!-- Use col-md-6 here -->
                    <a href="{{ route('member.create') }}" class="btn btn-primary"><i class='bx bx-plus'> Add Member</i></a>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-lg-8">
                <div class="table-responsive">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">All Personel <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Satuan Kerja</th>
                                            <th scope="col">Nama Personel</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Ambalan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                {{-- JIKA nama = null --}}
                                                <td>{{ $member->kategoriMembers->nama ?? 'Kosong' }}</td>
                                                {{-- <td>{{ $member->kategoriMembers->nama }}</td> --}}
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->jabatan }}</td>
                                                <td>{{ $member->ambalan }}</td>
                                                <td>
                                                    <a href="{{ route('member.edit', $member->id) }}"
                                                        class="btn btn-warning btn-sm"><i class='bx bx-edit'></i></a>
                                                    <form action="{{ route('member.destroy', $member->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus data?')"><i
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
                <!-- Website Traffic -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: 1048,
                                                name: 'Search Engine'
                                            },
                                            {
                                                value: 735,
                                                name: 'Direct'
                                            },
                                            {
                                                value: 580,
                                                name: 'Email'
                                            },
                                            {
                                                value: 484,
                                                name: 'Union Ads'
                                            },
                                            {
                                                value: 300,
                                                name: 'Video Ads'
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
