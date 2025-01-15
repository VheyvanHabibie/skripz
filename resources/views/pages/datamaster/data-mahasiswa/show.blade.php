@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=" {{ route('datamaster.index') }} ">Data Induk</a></li>
                            <li class="breadcrumb-item"><a href=" {{ route('mahasiswa.index') }} ">Data Mahasiswa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data Mahasiswa</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 text-center border-right">
                                        <div class="avatar avatar-xl mb-4">
                                            <img src="{{ asset($mahasiswa->foto) }}" alt="Profile{{ $mahasiswa->name }}"
                                                class="avatar-img rounded-circle">
                                        </div>
                                        <h6 class="h6">{{ $mahasiswa->name }}</h6>
                                        <h6 class="text-muted">{{ $mahasiswa->email }}</h6>
                                    </div>
                                    <div class="col-md-6 border-right">

                                        <div class="form-group">
                                            <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                                value="{{ $mahasiswa->tempat_lahir }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir"
                                                value="{{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                            <input type="text" class="form-control" id="jenis_kelamin"
                                                name="jenis_kelamin" value="{{ $mahasiswa->jenis_kelamin }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="required">Alamat Lengkap</label>
                                            <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" disabled>{{ $mahasiswa->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="no_telepon" class="required">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                                value="{{ $mahasiswa->no_telepon }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="nim" class="required">NIM</label>
                                            <input type="text" class="form-control" id="nim" name="nim"
                                                value="{{ $mahasiswa->nim }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan" class="required">Jurusan</label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                value="{{ $mahasiswa->jurusan->nama_jurusan ?? '' }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenjang_pendidikan" class="required">Jenjang Pendidikan</label>
                                            <input type="text" class="form-control" id="jenjang_pendidikan"
                                                name="jenjang_pendidikan" value="{{ $mahasiswa->jenjang_pendidikan }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_masuk" class="required">Tanggal Bergabung</label>
                                            <input type="text" class="form-control" id="tanggal_masuk"
                                                name="tanggal_masuk"
                                                value="{{ \Carbon\Carbon::parse($mahasiswa->tanggal_masuk)->locale('id')->translatedFormat('d F Y') }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
