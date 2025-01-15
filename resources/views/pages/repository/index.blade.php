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
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4>Repository Skripsi</h4>
                    <a class="btn mb-0 btn-primary" type="button" href="{{ route('repository-skripsi.create') }}">
                        Tambah <span class="fe fe-plus fe-15"></span>
                    </a>
                </div>
                <div class="row">
                    @if ($repo->count() > 0)
                        <div class="col-md-12">
                            <div class="list-group list-group-flush" id="list-pengumuman">
                                @foreach ($repo as $item)
                                    {{-- <a href="" class="text-decoration-none"> --}}
                                    <div class="list-group-item shadow-smooth custom-card mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="fe bi-folder-fill fe-20 text-blueblack"></span>
                                            </div>
                                            <div class="col-auto">
                                                <h6><strong>{{ $item->judul }}</strong></h6>
                                                <div class="my-0 text-muted small">{{ Str::limit($item->deskripsi, 200) }}
                                                </div>
                                            </div>
                                            <div class="col-auto ml-auto">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-sm dropdown-toggle more-vertical"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only"></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('repository-skripsi.show', $item->id) }}"
                                                            type="button">Detail</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('repository-skripsi.edit', $item->id) }}"
                                                            type="button">Edit</a>
                                                        <form action="{{ route('repository-skripsi.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a class="dropdown-item" href="#" id="Hapus"
                                                                onclick="deleteActivity({{ $item->id }})">
                                                                Hapus

                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </a> --}}
                                @endforeach
                            </div>
                            {{-- <div class="row">
                            @foreach ($repo as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow-smooth custom-card">
                                        <div class="card-body">
                                            <h5>{{ $item->judul }}</h5>
                                            <p>{{ $item->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                            {{-- <div class="card shadow-smooth mt-5">
                            <div class="card-body">
                                <div class="toolbar row mb-3">
                                    <div class="col">
                                        <h6 class="mb-4">Data Repositori Skripsi</h6>
                                    </div>
                                    <div class="col ml-auto">
                                        <button class="btn mb-0 btn-primary" style="float: right;" type="button"
                                            data-toggle="modal" data-target="#createModal" data-whatever="@mdo">
                                            Tambah <span class="fe fe-plus fe-15"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Links (Youtube, Github, Google Drive)</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($repo as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->deskripsi }}</td>
                                                    <td>
                                                        @foreach (json_decode($item->links) as $links)
                                                            <li> <a href="{{ $links }}"
                                                                    target="_blank">{{ $links }}</a></li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('repository-skripsi.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-outline-danger" id="Hapus"
                                                                onclick="deleteActivity({{ $item->id }})"><i
                                                                    class="fe fe-trash fe-12 "></i></button>
                                                            <button class="btn btn-outline-primary" data-toggle="modal"
                                                                data-target="#editModal{{ $item->id }}"
                                                                data-whatever="@mdo" type="button"><i
                                                                    class="fe fe-edit-3 fe-12 "></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    @else
                        <div class="col-md-12">
                            <h5 class="text-center">Tidak ada data ...</h5>
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
    
@endsection
