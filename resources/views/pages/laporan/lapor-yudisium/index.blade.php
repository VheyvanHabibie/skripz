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
                            <li class="breadcrumb-item"><a href=" {{ route('laporan.index') }} ">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Yudisium</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-laporan-yudisium')
                                    <button class="btn btn-primary float-right mb-3" type="button" data-toggle="modal"
                                        data-target="#createModal" data-whatever="@mdo">Upload <i
                                            class="fe fe-upload fe-12 text-white"></i></button>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Sidang</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>IPK</th>
                                                <th>Peringkat IPK</th>
                                                <th>Predikat Kelulusan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($yudisium as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_sidang)->locale('id')->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>{{ $item->mahasiswa->name }}</td>
                                                    <td>{{ $item->ipk }}</td>
                                                    <td>{{ $item->peringkat }}</td>
                                                    <td>{{ $item->peringkat_kelulusan }}</td>
                                                    <td>
                                                        <form action="{{ route('laporan-yudisium.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-laporan-yudisium')
                                                                <button class="btn btn-outline-danger" type="submit"
                                                                    id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-laporan-yudisium')
                                                                <button class="btn btn-outline-primary" data-toggle="modal"
                                                                    data-target="#editModal{{ $item->id }}"
                                                                    data-whatever="@mdo" type="button"><i
                                                                        class="fe fe-edit-3 fe-12"></i></button>
                                                            @endcan
                                                            {{-- <button class="btn" type="button"> <i
                                                                    class="fe fe-download fe-12 text-secondary"></i></button> --}}
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
    @include('pages.laporan.lapor-yudisium.create')
    @include('pages.laporan.lapor-yudisium.edit')
@endsection
