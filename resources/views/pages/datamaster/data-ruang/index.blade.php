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
                            <li class="breadcrumb-item active" aria-current="page">Data Ruang & Kelas</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses ruang')
                                    <button class="btn mb-0 btn-primary float-right mb-2" type="button" data-toggle="modal"
                                        data-target="#createModal" data-whatever="@mdo">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </button>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Ruang</th>
                                                <th>Kapasitas</th>
                                                <th>Jenis Ruang</th>
                                                <th>Lantai</th>
                                                <th>Gedung</th>
                                                <th>Fasilitas</th>
                                                <th>Ketersediaan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ruang as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_ruang }}</td>
                                                    <td>{{ $item->kapasitas }}</td>
                                                    <td>{{ $item->jenis_ruang }}</td>
                                                    <td>{{ $item->lantai }}</td>
                                                    <td>{{ $item->gedung }}</td>
                                                    <td class="text-start">
                                                        @foreach (json_decode($item->fasilitas) as $fasilitas)
                                                            <li>{{ $fasilitas }}
                                                            </li>
                                                        @endforeach
                                                    </td>
                                                    <td><span class="badge rounded-pill bg-lightdark mr-2 badge-width">
                                                            {{ $item->ketersediaan }}
                                                            <span
                                                                class="dot dot-md
                                                            @if ($item->ketersediaan == 'Tersedia') bg-success
                                                            @elseif($item->ketersediaan == 'Digunakan') bg-danger
                                                            @elseif($item->ketersediaan == 'Renovasi') bg-warning @endif">
                                                            </span>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('ruang.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-ruang')
                                                                <button class="btn btn-outline-danger" id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-ruang')
                                                                <button class="btn btn-outline-primary" data-toggle="modal"
                                                                    data-target="#editModal{{ $item->id }}"
                                                                    data-whatever="@mdo" type="button"><i
                                                                        class="fe fe-edit-3 fe-12"></i></button>
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
    @include('pages.datamaster.data-ruang.create')
    @include('pages.datamaster.data-ruang.edit')
@endsection
