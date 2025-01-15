@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h5 class="mb-4">Management Akun</h5>
                <div class="row mb-2">
                    @can('akses management-user')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('management-user.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-fill fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Manajemen Pengguna</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    @can('akses management-role')
                        <div class="col-md-3 mb-4">
                            <a class="hover-white" href="{{ route('management-role.index') }}">
                                <div class="card shadow-smooth bg-white custom-hover custom-card h-100">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <i class="fe bi-person-fill-lock fe-22 text-blueblack"></i>
                                        </div>
                                        <h6 class="text-blueblack h6">Manajemen Role</h6>
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
