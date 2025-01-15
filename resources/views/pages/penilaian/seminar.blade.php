@extends('layouts.template')

@section('content')
    <div class="container-fluid">
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
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=" {{ route('penilaian.index') }} ">Penilaian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Penilaian Seminar</li>
                        </ol>
                    </nav>
                    <!-- Striped rows -->
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-12 mb-2">
                                        <div class="card shadow-smooth custom-card">
                                            <div class="card-body">
                                                <label for="mahasiswa_id" class="required">Mahasiswa</label>
                                                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control select2"
                                                    required>
                                                    @foreach ($mahasiswa as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 mb-2">
                                        <div class="card shadow-smooth custom-card">
                                            <div class="card-body">
                                                <div class="toolbar row mb-3">
                                                    <div class="col">
                                                        <h6 class="card-title ">Tulisan</h6>
                                                    </div>
                                                    <div class="col ml-auto">
                                                        <button class="btn btn-primary float-right ml-3" type="button"
                                                            data-toggle="modal" data-target="#createModalTulisan"
                                                            data-whatever="@mdo">Tambah +</button>
                                                    </div>
                                                </div>
                                                <form action="{{ route('tulisan.update') }}" method="POST">
                                                    @csrf
                                                    @method('Patch')
                                                    <div class="table-responsive mb-3">
                                                        <table class="table table-bordered table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center font-weight-bold col-1">No</th>
                                                                    <th class="text-center font-weight-bold">Aspek Yang Di
                                                                        Nilai</th>
                                                                    <th class="text-center font-weight-bold col-1">Nilai
                                                                    </th>
                                                                    <th class="text-center font-weight-bold col-1">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tulisan as $item)
                                                                    <tr>
                                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                                        <td><input type="hidden"
                                                                                name="tulisan[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            {{ $item->tulisan }}
                                                                        </td>
                                                                        <td><input type="number" min="0"
                                                                                max="5"
                                                                                class="form-control form-control-sm"
                                                                                name="tulisan[{{ $item->id }}][nilai]"
                                                                                value="{{ $item->nilai }}" required></td>
                                                                        <td class="text-center">
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="btn btn-sm dropdown-toggle more-horizontal"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <span
                                                                                        class="text-muted sr-only">Action</span>
                                                                                </button>
                                                                                <form
                                                                                    action="{{ route('tulisan.destroy', $item->id) }}"
                                                                                    method="POST"
                                                                                    id="Hapus{{ $item->id }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-right">
                                                                                        <a class="dropdown-item"
                                                                                            href="#" type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#editModalTulisan{{ $item->id }}"
                                                                                            data-whatever="@mdo">Edit</a>
                                                                                        <button class="dropdown-item"
                                                                                            type="submit"
                                                                                            onclick="deleteActivity({{ $item->id }})">Hapus</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 mb-2">
                                        <div class="card shadow-smooth custom-card">
                                            <div class="card-body">
                                                <div class="toolbar row mb-3">
                                                    <div class="col">
                                                        <h6 class="card-title "> Presentasi</h6>
                                                    </div>
                                                    <div class="col ml-auto">
                                                        <button class="btn btn-primary float-right ml-3" type="button"
                                                            data-toggle="modal" data-target="#createModalPresentasi"
                                                            data-whatever="@mdo">Tambah +</button>
                                                    </div>
                                                </div>
                                                <form action="{{ route('presentasi.update') }}" method="POST">
                                                    @csrf
                                                    @method('Patch')
                                                    <div class="table-responsive mb-3">
                                                        <table class="table table-bordered table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center font-weight-bold col-1">No</th>
                                                                    <th class="text-center font-weight-bold">Aspek Yang Di
                                                                        Nilai</th>
                                                                    <th class="text-center font-weight-bold col-1">Nilai
                                                                    </th>
                                                                    <th class="text-center font-weight-bold col-1">Aksi
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($presentasi as $item)
                                                                    <tr>
                                                                        <td class="text-center">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td><input type="hidden"
                                                                                name="presentasi[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            {{ $item->presentasi }}
                                                                        </td>
                                                                        <td><input type="number" min="0"
                                                                                max="5"
                                                                                class="form-control form-control-sm"
                                                                                name="presentasi[{{ $item->id }}][nilai]"
                                                                                value="{{ $item->nilai }}" required></td>
                                                                        <td class="text-center">
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="btn btn-sm dropdown-toggle more-horizontal"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <span
                                                                                        class="text-muted sr-only">Action</span>
                                                                                </button>
                                                                                <form
                                                                                    action="{{ route('presentasi.destroy', $item->id) }}"
                                                                                    method="POST"
                                                                                    id="Hapus{{ $item->id }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-right">
                                                                                        <a class="dropdown-item"
                                                                                            href="#" type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#editModalPresentasi{{ $item->id }}"
                                                                                            data-whatever="@mdo">Edit</a>
                                                                                        <button class="dropdown-item"
                                                                                            type="submit"
                                                                                            onclick="deleteActivity({{ $item->id }})">Hapus</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 mb-2">
                                        <div class="card shadow-smooth custom-card">
                                            <div class="card-body">
                                                <div class="toolbar row mb-3">
                                                    <div class="col">
                                                        <h6 class="card-title"> Penguasaan</h6>
                                                    </div>
                                                    <div class="col ml-auto">
                                                        <div class="dropdown float-right">
                                                            <button class="btn btn-primary float-right ml-3"
                                                                type="button" data-toggle="modal"
                                                                data-target="#createModalPenguasaan"
                                                                data-whatever="@mdo">Tambah +</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('penguasaan.update') }}" method="POST">
                                                    @csrf
                                                    @method('Patch')
                                                    <div class="table-responsive mb-3">
                                                        <table class="table table-bordered table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center font-weight-bold col-1">No</th>
                                                                    <th class="text-center font-weight-bold">Aspek Yang Di
                                                                        Nilai</th>
                                                                    <th class="text-center font-weight-bold col-1">Nilai
                                                                    </th>
                                                                    <th class="text-center font-weight-bold col-1">Aksi
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($penguasaan as $item)
                                                                    <tr>
                                                                        <td class="text-center">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td><input type="hidden"
                                                                                name="penguasaan[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            {{ $item->penguasaan }}
                                                                        </td>
                                                                        <td><input type="number" min="0"
                                                                                max="5"
                                                                                class="form-control form-control-sm"
                                                                                name="penguasaan[{{ $item->id }}][nilai]"
                                                                                value="{{ $item->nilai }}" required></td>

                                                                        <td class="text-center">
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="btn btn-sm dropdown-toggle more-horizontal"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <span
                                                                                        class="text-muted sr-only">Action</span>
                                                                                </button>
                                                                                <form
                                                                                    action="{{ route('penguasaan.destroy', $item->id) }}"
                                                                                    method="POST"
                                                                                    id="Hapus{{ $item->id }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-right">
                                                                                        <a class="dropdown-item"
                                                                                            href="#" type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#editModalPenguasaan{{ $item->id }}"
                                                                                            data-whatever="@mdo">Edit</a>
                                                                                        <button class="dropdown-item"
                                                                                            type="submit"
                                                                                            onclick="deleteActivity({{ $item->id }})">Hapus</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 mb-2">
                                        <div class="card shadow-smooth custom-card">
                                            <div class="card-body">
                                                <div class="toolbar row mb-3">
                                                    <div class="col">
                                                        <h6 class="card-title"> Kualitas Produk</h6>
                                                    </div>
                                                    <div class="col ml-auto">
                                                        <div class="dropdown float-right">
                                                            <button class="btn btn-primary float-right ml-3"
                                                                type="button" data-toggle="modal"
                                                                data-target="#createModalKualitas"
                                                                data-whatever="@mdo">Tambah +</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('kualitas.update') }}" method="POST">
                                                    @csrf
                                                    @method('Patch')
                                                    <div class="table-responsive mb-3">
                                                        <table class="table table-bordered table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center font-weight-bold col-1">No</th>
                                                                    <th class="text-center font-weight-bold">Aspek Yang Di
                                                                        Nilai</th>
                                                                    <th class="text-center font-weight-bold col-1">Nilai
                                                                    </th>
                                                                    <th class="text-center font-weight-bold col-1">Aksi
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($kualitas as $item)
                                                                    <tr>
                                                                        <td class="text-center">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td><input type="hidden"
                                                                                name="kualitas[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            {{ $item->kualitas }}
                                                                        </td>
                                                                        <td><input type="number" min="0"
                                                                                max="5"
                                                                                class="form-control form-control-sm"
                                                                                name="kualitas[{{ $item->id }}][nilai]"
                                                                                value="{{ $item->nilai }}" required></td>

                                                                        <td class="text-center">
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="btn btn-sm dropdown-toggle more-horizontal"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <span
                                                                                        class="text-muted sr-only">Action</span>
                                                                                </button>
                                                                                <form
                                                                                    action="{{ route('kualitas.destroy', $item->id) }}"
                                                                                    method="POST"
                                                                                    id="Hapus{{ $item->id }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-right">
                                                                                        <a class="dropdown-item"
                                                                                            href="#" type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#editModalKualitas{{ $item->id }}"
                                                                                            data-whatever="@mdo">Edit</a>
                                                                                        <button class="dropdown-item"
                                                                                            type="submit"
                                                                                            onclick="deleteActivity({{ $item->id }})">Hapus</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div>
        </div>
    </div>
    @include('pages.berkas.tulisan.create')
    @include('pages.berkas.tulisan.edit')
    @include('pages.berkas.presentasi.create')
    @include('pages.berkas.presentasi.edit')
    @include('pages.berkas.kualitas.create')
    @include('pages.berkas.kualitas.edit')
    @include('pages.berkas.penguasaan.create')
    @include('pages.berkas.penguasaan.edit')
@endsection
