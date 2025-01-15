@extends('layouts.template')
<style>
    td {
        font-size: 10px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('datamaster.index') }} ">Data Induk</a></li>
                        <li class="breadcrumb-item"><a href=" {{ route('dosen.index') }} ">Data Dosen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Data Dosen</li>
                    </ol>
                </nav>
                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center border-right">
                                <div class="avatar avatar-xl mb-2">
                                    <img src="{{ asset($dosen->foto) }}" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <h6 class="h6">{{ $dosen->nama_dosen }}</h6>
                                <h6 class="h6 text-muted mb-4">{{ $dosen->email }}</h6>
                            </div>
                            <div class="col-md-6 border-right">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="{{ $dosen->tempat_lahir }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ \Carbon\Carbon::parse($dosen->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                        value="{{ $dosen->jenis_kelamin }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="required">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" disabled>{{ $dosen->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_telepon" class="required">Nomor Telepon / WhatsApp</label>
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                        value="{{ $dosen->no_telepon }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nip_dosen" class="required">NIP</label>
                                    <input type="text" class="form-control" id="nip_dosen" name="nip_dosen"
                                        value="{{ $dosen->nip_dosen }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan_id" class="required">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan_id" name="jabatan_id"
                                        value="{{ $dosen->jabatan->nama_jabatan }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="keahlian_id" class="required">Bidang Keahlian</label>
                                    @foreach (json_decode($dosen->bidang_keahlian) as $item)
                                        <li>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="keilmuan_id" class="required">Kelompok Keilmuan</label>
                                    <input type="text" class="form-control" id="keilmuan_id" name="keilmuan_id"
                                        value="{{ $dosen->keilmuan->nama_keilmuan }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanda_tangan" class="required">Tanda Tangan</label>
                                    <p>
                                        <img alt="tandatangan{{ $dosen->id }}" src="{{ asset($dosen->paraf) }}"
                                            width="50%">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center justify-content-between">
                            <div class="col">
                                <small>
                                    <span
                                        class="dot dot-lg
                              @if ($dosen->status_dosen == 'Aktif') bg-success
                              @elseif($dosen->status_dosen == 'Tidak Aktif')
                              bg-danger @endif"></span>
                                    {{ $dosen->status_dosen }} </small>
                            </div>
                            @if ($dosen->akun_link != null)
                                <div class="col-auto">
                                    <a href="{{ $dosen->akun_link }}" target="_blank"><i
                                            class="fe bi-linkedin fe-16"></i></a>
                                </div>
                            @endif

                        </div>
                    </div> <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
@endsection
