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
                            <li class="breadcrumb-item active" aria-current="page">Data Topik Skripsi</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                @can('akses tambah-topik')
                                    <button class="btn mb-0 btn-primary float-right mb-3" type="button" data-toggle="modal"
                                        data-target="#createModal" data-whatever="@mdo">
                                        Tambah <span class="fe fe-plus fe-15"></span>
                                    </button>
                                @endcan
                                @if (Auth::user()->role_id == 2)
                                    <form action="{{ route('updateStatussk') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="toolbar row mb-3">
                                            <div class="col ml-auto">
                                                <div class="dropdown float-right">
                                                    <button class="btn btn-primary float-right ml-3" type="submit">Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>Kelompok Keilmuan</th> --}}
                                                <th>Judul Topik</th>
                                                <th>Kata Kunci</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th class="col-2">Link Referensi</th>
                                                <th class="col-2">Sumber</th>
                                                <th>Status Topik</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topiksk as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $item->keilmuan->nama_keilmuan }}</td> --}}
                                                    <td>{{ $item->judul_topik }}</td>
                                                    <td>{{ $item->kata_kunci }}</td>
                                                    {{-- <td>{{ Str::limit($item->deskripsi, 10) }}</td> --}}
                                                    <td class="text-start">
                                                        @foreach (json_decode($item->link) as $link)
                                                            <li><a href="{{ $link }}"
                                                                    target="_blank">{{ $link }}</a>
                                                            </li>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $item->sumber->sumber_referensi }}</td>
                                                    <td>
                                                        @if (Auth::user()->role_id == 2)
                                                            <input type="hidden"
                                                                name="judul_topik[{{ $item->id }}][id]"
                                                                value="{{ $item->id }}">
                                                            <select name="judul_topik[{{ $item->id }}][status_topik]"
                                                                class="form-control form-control-sm"
                                                                id="judul_topik[{{ $item->id }}][status_topik]">
                                                                <option value="Diajukan"
                                                                    @if ($item->status_topik == 'Diajukan') selected @endif>
                                                                    Diajukan</option>
                                                                <option value="Disetujui"
                                                                    @if ($item->status_topik == 'Disetujui') selected @endif>
                                                                    Disetujui</option>
                                                                <option value="Ditolak"
                                                                    @if ($item->status_topik == 'Ditolak') selected @endif>
                                                                    Ditolak</option>
                                                            </select>
                                                            </form>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill bg-lightdark mr-2 badge-width">{{ $item->status_topik }}
                                                                <span
                                                                    class="dot dot-md
                                                        @if ($item->status_topik == 'Disetujui') bg-success
                                                        @elseif($item->status_topik == 'Ditolak') bg-danger
                                                        @elseif ($item->status_topik == 'Diajukan') bg-warning @endif"></span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('topik-skripsi.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            @can('akses hapus-topik')
                                                                <button class="btn btn-outline-danger" type="submit"
                                                                    id="Hapus"
                                                                    onclick="deleteActivity({{ $item->id }})"><i
                                                                        class="fe fe-trash fe-12"></i></button>
                                                            @endcan
                                                            @can('akses edit-topik')
                                                                <button class="btn btn-outline-primary" data-toggle="modal"
                                                                    data-target="#editModal{{ $item->id }}"
                                                                    data-whatever="@mdo" type="button"><i
                                                                        class="fe fe-edit-3 fe-12"></i></button>
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
    @include('pages.datamaster.data-topiksk.create')
    @include('pages.datamaster.data-topiksk.edit')
    @include('pages.datamaster.data-topiksk.show')
@endsection
