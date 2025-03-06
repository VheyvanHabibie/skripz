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
                            <li class="breadcrumb-item active" aria-current="page">Data Bimbingan</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                @can('akses tambah-bimbingan')
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
                                                <th>Nama Mahasiswa</th>
                                                <th>Dosen Pembimbing</th>
                                                <th>Prodi</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Status Bimbingan</th>
                                                <th>Ruangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadbim as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahbim->mahasiswa->name }}</td>
                                                    <td>{{ $item->dospem->dosen->nama_dosen ?? '-' }}</td>
                                                    <td>{{ $item->prodi }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->locale('id')->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>{{ date('h:i A', strtotime($item->jam_mulai)) }}</td>
                                                    <td>{{ date('h:i A', strtotime($item->jam_selesai)) }}</td>
                                                    <td><span
                                                            class="badge rounded-pill bg-lightdark mr-2 badge-width">{{ $item->status_bimbingan }}
                                                            <span class="dot dot-md bg-success"></span></span></td>
                                                    <td>{{ $item->ruang->nama_ruang }}</td>
                                                    <td>
                                                        <form action="{{ route('bimbingan.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-bimbingan')
                                                                <button class="btn btn-outline-danger" type="submit"
                                                                    id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-bimbingan')
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
    @include('pages.datamaster.data-jadbim.create')
    @include('pages.datamaster.data-jadbim.edit')
@endsection
