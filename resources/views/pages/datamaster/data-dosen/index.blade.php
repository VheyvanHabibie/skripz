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
                            <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-dosen')
                                    <a class="btn mb-0 btn-primary float-right mb-3" type="button"
                                        href="{{ route('dosen.create') }}">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </a>
                                    <a class="btn mb-0 btn-info mb-3 mr-2" type="button"
                                        href="{{ asset('assets/file/Template_Form_Data_Dosen.xlsx') }}" download>
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
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                                {{-- <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th> --}}
                                                <th>Jenis Kelamin</th>
                                                {{-- <th>Alamat</th> --}}
                                                <th>Email</th>
                                                <th>No Telepon / WhatsApp</th>
                                                {{-- <th>Status Dosen</th> --}}
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dosen as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nip_dosen }}</td>
                                                    <td>{{ Str::limit($item->nama_dosen) }}</td>
                                                    {{-- <td>{{ $item->tempat_lahir }}</td> --}}
                                                    {{-- <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                                                    </td> --}}
                                                    <td>{{ $item->jenis_kelamin }}</td>
                                                    {{-- <td>{{ Str::limit($item->alamat, 10) }}</td> --}}
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->no_telepon }}</td>
                                                    {{-- <td><span
                                                            class="badge rounded-pill bg-lightdark mr-2 badge-width">{{ $item->status_dosen }}
                                                            <span
                                                                class="dot dot-md
                                                            @if ($item->status_dosen == 'Aktif') bg-success
                                                            @elseif($item->status_dosen == 'Tidak Aktif')
                                                            bg-danger @endif"></span></span>
                                                    </td> --}}
                                                    <td>
                                                        <form action="{{ route('dosen.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-dosen')
                                                                <button class="btn btn-outline-danger" id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-dosen')
                                                                <a class="btn btn-outline-primary"
                                                                    href="{{ route('dosen.edit', $item->slug) }}"
                                                                    type="button"><i class="fe fe-edit-3 fe-12 "></i></a>
                                                            @endcan
                                                            <a class="btn btn-outline-success"
                                                                href="{{ route('dosen.show', $item->slug) }}"
                                                                type="button"><i class="fe fe-info fe-12"></i></a>
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
    @include('pages.datamaster.data-dosen.import')
@endsection
