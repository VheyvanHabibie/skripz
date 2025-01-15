@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h5 class="mb-4">Data Utama</h5>
                <div class="row mb-2">
                    @can('akses provinsi')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('provinsi.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-geo fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Provinsi</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses provinsi')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('kabupaten.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-geo fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Kabupaten / Kota</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    {{-- <div class="col-md-3 mb-4">
                        <a class="hover-white" href="{{ route('kecamatan.index') }}">
                            <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <i class="fe bi-geo fe-22 text-blueblack"></i>
                                    </div>
                                    <h6 class="text-blueblack h6">Data Kecamatan</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a class="hover-white" href="{{ route('kelurahan.index') }}">
                            <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <i class="fe bi-geo fe-22 text-blueblack"></i>
                                    </div>
                                    <h6 class="text-blueblack h6">Data Kelurahan</h6>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    @can('akses perguruan-tinggi')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('perguruan-tinggi.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-bank fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Perguruan Tinggi</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses jabatan')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('jabatan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-standing fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Jabatan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses jurusan')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('jurusan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-collection fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Jurusan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses bidang-keahlian')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('bidang-keahlian.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-ui-checks fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Bidang Keahlian</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses keilmuan')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('keilmuan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-journals fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Keilmuan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses sumber-referensi')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('sumber-referensi.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-bookmarks fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Sumber</h6>
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
