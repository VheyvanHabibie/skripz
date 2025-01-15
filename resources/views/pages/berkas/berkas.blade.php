@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h5 class="mb-4">Pengaturan Berkas dan Aspek Penilaian</h5>
                <div class="row mb-2">
                    <div class="col-md-3 mb-2">
                        <a class="hover-white" href="{{ route('tulisan.index') }}">
                            <div class="card shadow bg-info custom-hover custom-card">
                                <div class="card-body">
                                    <div class="kubus kubus-sm bg-white mb-4">
                                        <i class="fe bi-person-fill fe-20 text-info"></i>
                                    </div>
                                    <h6 class="text-white h6">Tulisan</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a class="hover-white" href="{{ route('kualitas.index') }}">
                            <div class="card shadow bg-info custom-hover custom-card">
                                <div class="card-body">
                                    <div class="kubus kubus-sm bg-white mb-4">
                                        <i class="fe bi-person-fill-lock fe-20 text-info"></i>
                                    </div>
                                    <h6 class="text-white h6">Kualitas</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a class="hover-white" href="{{ route('penguasaan.index') }}">
                            <div class="card shadow bg-info custom-hover custom-card">
                                <div class="card-body">
                                    <div class="kubus kubus-sm bg-white mb-4">
                                        <i class="fe bi-person-fill-lock fe-20 text-info"></i>
                                    </div>
                                    <h6 class="text-white h6">Penguasaan</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a class="hover-white" href="{{ route('presentasi.index') }}">
                            <div class="card shadow bg-info custom-hover custom-card">
                                <div class="card-body">
                                    <div class="kubus kubus-sm bg-white mb-4">
                                        <i class="fe bi-person-fill-lock fe-20 text-info"></i>
                                    </div>
                                    <h6 class="text-white h6">Presentasi</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a class="hover-white" href="{{ route('persyaratan.index') }}">
                            <div class="card shadow bg-info custom-hover custom-card">
                                <div class="card-body">
                                    <div class="kubus kubus-sm bg-white mb-4">
                                        <i class="fe bi-person-fill-lock fe-20 text-info"></i>
                                    </div>
                                    <h6 class="text-white h6">Persyaratan</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
