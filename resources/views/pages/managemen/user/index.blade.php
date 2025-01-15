@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                {{-- Error Validation --}}
                <x-error-validation-message errors="$errors" />

                {{-- Alert Message --}}
                @if (session()->has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <x-success-message action="{{ session()->get('success') }}" />
                        </div>
                    </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('management.index') }} ">Management Akun</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Management User</li>
                    </ol>
                </nav>
                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        @can('akses tambah-management-user')
                            <button class="btn mb-0 btn-primary float-right mb-3" type="button" data-toggle="modal"
                                data-target="#createModal" data-whatever="@mdo">
                                Tambah <span class="fe fe-plus fe-15"></span>
                            </button>
                            {{-- <a class="btn mb-0 btn-info mb-3 mr-2" type="button" href="{{ asset('assets/file/Template_Form_Data_Mahasiswa.xlsx') }}" download>
                                Unduh Template <span class="fe fe-download fe-15"></span>
                            </a>
                            <button class="btn mb-0 btn-success float-right mb-3 mr-2" type="button" data-toggle="modal"
                                data-target="#importModal" data-whatever="@mdo">
                                Import <span class="fe fe-plus fe-15"></span>
                            </button> --}}
                        @endcan
                        <div class="table-responsive">
                            <table class="table dataTables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama User</th>
                                        <th>Email User</th>
                                        <th>Role User</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> <span class="avatar avatar-sm mt-2">
                                                    <img src="{{ asset($user->foto) }}" alt="..."
                                                        class="avatar-img rounded-circle">
                                                </span></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-pill bg-primary text-white mr-2 mb-2">{{ $user->role->name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('management-user.destroy', $user->id) }}"
                                                    method="POST" id="Hapus{{ $user->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    @can('akses hapus-management-user')
                                                        <button class="btn btn-outline-danger" type="submit" id="Hapus"
                                                            onclick="deleteActivity({{ $user->id }})"><i
                                                                class="fe fe-trash fe-12"></i></button>
                                                    @endcan
                                                    @can('akses edit-management-user')
                                                        <button class="btn btn-outline-primary" type="button"
                                                            data-toggle="modal" data-target="#editModal{{ $user->id }}"
                                                            data-whatever="@mdo"><i class="fe fe-edit fe-12"></i></button>
                                                    @endcan
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
    </div>
    @include('pages.managemen.user.create')
    @include('pages.managemen.user.edit')
    {{-- @include('pages.managemen.user.import') --}}
@endsection
