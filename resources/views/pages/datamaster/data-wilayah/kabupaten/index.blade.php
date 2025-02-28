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
                            <li class="breadcrumb-item"><a href=" {{ route('datautama.index') }} ">Data Utama</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kabupaten</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-kabupaten')
                                    <button class="btn btn-primary float-right mb-3" type="button" data-toggle="modal"
                                        data-target="#createModal" data-whatever="@mdo">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </button>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th class="text-start">No</th>
                                                <th class="text-start">Nama Kabupaten</th>
                                                <th class="text-start">Provinsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kabupaten as $item)
                                                <tr>
                                                    <td class="text-start">{{ $loop->iteration }}</td>
                                                    <td class="text-start">{{ $item->type }} {{ $item->name }}</td>
                                                    <td class="text-start">{{ $item->provinsi->name }}</td>
                                                    <td>
                                                        <form action="{{ route('kabupaten.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-kabupaten')
                                                                <button class="btn btn-outline-danger" id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-kabupaten')
                                                                <button class="btn btn-outline-primary" data-toggle="modal"
                                                                    data-target="#editModal{{ $item->id }}"
                                                                    data-whatever="@mdo" type="button"><i
                                                                        class="fe fe-edit-3 fe-12 "></i></button>
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
        </div>
    </div>
    @include('pages.datamaster.data-wilayah.kabupaten.create')
    @include('pages.datamaster.data-wilayah.kabupaten.edit')
@endsection
