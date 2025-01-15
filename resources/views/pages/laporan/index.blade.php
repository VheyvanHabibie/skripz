@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h5 class="mb-4">Laporan</h5>
                <div class="row mb-2">
                    @can('akses laporan-usulan-proposal')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('laporan-usulan-proposal.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-file-earmark-text fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Laporan Usulan Proposal</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses laporan-kemajuan-seminar')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('laporan-kemajuan-seminar.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-file-earmark-text fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Laporan Kemajuan Seminar</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses laporan-bimbingan')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('laporan-bimbingan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-file-earmark-text fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Laporan Bimbingan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses laporan-sidang')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('laporan-kemajuan-sidang.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-file-earmark-text fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Laporan Sidang</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses laporan-yudisium')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('laporan-yudisium.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-file-earmark-text fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Laporan Yudisium</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
