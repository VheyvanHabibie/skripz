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
                            <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-mahasiswa')
                                    <a class="btn mb-0 btn-primary float-right mb-3" type="button"
                                        href="{{ route('mahasiswa.create') }}">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </a>
                                    <a class="btn mb-0 btn-info mb-3 mr-2" type="button"
                                        href="{{ asset('assets/file/Template_Form_Data_Mahasiswa.xlsx') }}" download>
                                        Unduh Template <span class="fe fe-download fe-15"></span>
                                    </a>
                                    <button class="btn mb-0 btn-success float-right mb-3 mr-2" type="button"
                                        data-toggle="modal" data-target="#importModal" data-whatever="@mdo">
                                        Import <span class="fe fe-plus fe-15"></span>
                                    </button>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mahasiswa</th>
                                                {{-- <th>Alamat</th> --}}
                                                <th>NIM</th>
                                                {{-- <th>Jurusan</th>
                                                <th>Jenjang Pendidikan</th> --}}
                                                <th>Email</th>
                                                <th>No Telepon</th>
                                                <th>Tanggal Bergabung</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswa as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::limit($item->name) }}</td>
                                                    {{-- <td>{{ Str::limit($item->alamat, 15) }}</td> --}}
                                                    <td>{{ $item->nim }}</td>
                                                    {{-- <td>{{ $item->jurusan->nama_jurusan ?? '' }}</td> --}}
                                                    {{-- <td>{{ $item->jenjang_pendidikan }}</td> --}}
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->no_telepon }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->locale('id')->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('mahasiswa.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-mahasiswa')
                                                                <button class="btn btn-outline-danger" type="submit"
                                                                    id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-mahasiswa')
                                                                <a class="btn btn-outline-primary"
                                                                    href="{{ route('mahasiswa.edit', $item->slug) }}"
                                                                    type="button"><i class="fe fe-edit-3 fe-12 "></i></a>
                                                            @endcan
                                                            <a class="btn btn-outline-success"
                                                                href="{{ route('mahasiswa.show', $item->slug) }}"
                                                                type="button"><i class="fe fe-info fe-12"></i></a>
                                                        </form>
                                                    </td>
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
    @include('pages.datamaster.data-mahasiswa.import')
@endsection
