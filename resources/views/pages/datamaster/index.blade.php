@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h5 class="mb-4">Data Induk</h5>
                <div class="row mb-2">
                    @can('akses kaprodi')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('kaprodi.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-vcard fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Kaprodi</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses sekretariat')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('sekretariat.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-lines-fill fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Sekretariat</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses dosen')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('dosen.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-fill-check fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Dosen</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses mahasiswa')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('mahasiswa.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-mortarboard-fill fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Mahasiswa</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses mitra')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('mitra.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-tools fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Mitra Industri</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses dospem')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('dosen-pembimbing.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-workspace fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Dosen Pembimbing</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses dospeng')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('dosen-penguji.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-video3 fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Dosen Penguji</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan

                    @can('akses mahbim')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('mahasiswa-bimbingan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-mortarboard fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Mahasiswa Bimbingan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses ruang')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('ruang.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-building fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Ruang & Kelas</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan


                    @can('akses bimbingan')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('bimbingan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-clock fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Bimbingan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan

                    @can('akses topik')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('topik-skripsi.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-clipboard-minus fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Topik Skripsi</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses kelilmuan')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('kelompok-keilmuan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe fe-users fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Kelompok Keilmuan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan

                    @can('akses thakademik')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('tahun-akademik.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-calendar3 fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Tahun Akademik</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan

                    @can('akses predlulus')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('predikat-kelulusan.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-bar-chart fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Data Predikat Kelulusan</h6>
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
