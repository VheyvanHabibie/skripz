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
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=" {{ route('datamaster.index') }} ">Data Induk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kelompok Keilmuan</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-kelilmuan')
                                    <button class="btn mb-0 btn-primary float-right mb-3" type="button" data-toggle="modal"
                                        data-target="#createModal" data-whatever="@mdo">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </button>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelompok Keilmuan</th>
                                                <th>Bidang Kajian</th>
                                                <th>Koordinator</th>
                                                <th>Fakultas</th>
                                                <th>Deskripsi</th>
                                                <th>Link Repository</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelilmuan as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->keilmuan->nama_keilmuan }}</td>
                                                    <td>{{ $item->bidang_kajian }}</td>
                                                    <td>{{ $item->koordinator }}</td>
                                                    <td>{{ $item->fakultas }}</td>
                                                    <td>{{ Str::limit($item->deskripsi, 10) }}</td>
                                                    <td><a href="{{ $item->links }}"
                                                            target="_blank">{{ $item->links }}</a></td>
                                                    <td>
                                                        <form action="{{ route('kelompok-keilmuan.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-kelilmuan')
                                                                <button class="btn btn-outline-danger" type="submit"
                                                                    id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-kelilmuan')
                                                                <button class="btn btn-outline-primary" data-toggle="modal"
                                                                    data-target="#editModal{{ $item->id }}"
                                                                    data-whatever="@mdo" type="button"><i
                                                                        class="fe fe-edit-3 fe-12 "></i></button>
                                                            @endcan
                                                            <button class="btn btn-outline-success" data-toggle="modal"
                                                                data-target=".showModal{{ $item->id }}"
                                                                type="button"><i class="fe fe-info fe-12"></i></button>
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
        </div>
    </div>
    @include('pages.datamaster.data-kelilmuan.create')
    @include('pages.datamaster.data-kelilmuan.edit')
    @include('pages.datamaster.data-kelilmuan.show')
@endsection
