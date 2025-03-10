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
                            <li class="breadcrumb-item active" aria-current="page">Data Mitra Industri</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-mitra')
                                    <a class="btn mb-0 btn-primary float-right mb-3" type="button"
                                        href="{{ route('mitra.create') }}">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </a>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mitra</th>
                                                {{-- <th>Bidang Usaha</th>
                                                <th>Alamat</th> --}}
                                                <th>Email Mitra</th>
                                                {{-- <th>No Telepon Mitra</th>
                                                <th>Website</th>
                                                <th>Deskripsi</th> --}}
                                                <th>Logo</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mitra as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->penanggung_jawab }}</td>
                                                    <td>{{ $item->email_mitra }}</td>
                                                    {{-- <td>{{ $item->bidang_usaha }}</td>
                                                    <td>{{ Str::limit($item->alamat_mitra, 10) }}</td>
                                                    <td>{{ $item->email_mitra }}</td>
                                                    <td>{{ $item->no_telepon_mitra }}</td>
                                                    <td><a href="{{ $item->website }}"
                                                            target="__blank">{{ $item->website }}</a></td>

                                                    <td>{{ Str::limit($item->deskripsi, 10) }}</td> --}}
                                                    <td>
                                                        <div class="avatar avatar-sm">
                                                            <img alt="..." class="avatar-img rounded-circle"
                                                                src="{{ asset($item->logo) }}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('mitra.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-mitra')
                                                                <button class="btn btn-outline-danger" type="submit"
                                                                    id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12 "></i></button>
                                                            @endcan
                                                            @can('akses edit-mitra')
                                                                <a class="btn btn-outline-primary" type="button"
                                                                    href="{{ route('mitra.edit', $item->id) }}"><i
                                                                        class="fe fe-edit-3 fe-12 "></i></a>
                                                            @endcan
                                                            <a class="btn btn-outline-success" type="button"
                                                                href="{{ route('mitra.show', $item->id) }}"
                                                                type="button"><i class="fe fe-info fe-12 "></i></a>
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
@endsection
