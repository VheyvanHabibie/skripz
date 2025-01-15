@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 mb-2">
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

                        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card shadow-smooth custom-card mb-4">
                                <div class="card-header text-center">
                                    <strong>Pengaturan Aplikasi</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_perguruan_tinggi" class="required">Nama Perguruan
                                                Tinggi</label>
                                            <input type="text" class="form-control" name="nama_perguruan_tinggi"
                                                value="{{ $setting ? $setting->nama_perguruan_tinggi : '' }}"
                                                placeholder="Masukan nama perguruan tinggi" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_aplikasi" class="required">Nama Aplikasi</label>
                                            <input type="text" class="form-control" name="nama_aplikasi"
                                                value="{{ $setting ? $setting->nama_aplikasi : '' }}"
                                                placeholder="Masukan nama aplikasi" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="deskripsi" class="required">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required>{{ $setting ? $setting->deskripsi : '' }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alamat" class="required">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" rows="4" required>{{ $setting ? $setting->alamat : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="required">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $setting ? $setting->email : '' }}"
                                                    placeholder="Masukan email aplikasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_telepon" class="required">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="no_telepon"
                                                    value="{{ $setting ? $setting->no_telepon : '' }}"
                                                    placeholder="Masukan no_telepon aplikasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="url_instagram">Link Instagram</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe bi-instagram fe-14"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="url_instagram"
                                                    value="{{ old('url_instagram', $setting->url_instagram) }}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="url_linkedin">Link LinkedIn</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-linkedin fe-16"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="url_linkedin"
                                                    value="{{ old('url_linkedin', $setting->url_linkedin) }}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="url_youtube">Link Youtube</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-youtube fe-16"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="url_youtube"
                                                    value="{{ old('url_youtube', $setting->url_youtube) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="versi" class="required">Versi</label>
                                                <input type="text" class="form-control" name="versi"
                                                    value="{{ $setting ? $setting->versi : '' }}"
                                                    placeholder="Masukan versi aplikasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahun" class="required">Tahun</label>
                                                <input type="number" class="form-control" name="tahun" min="2020"
                                                    max="<?php echo date('Y'); ?>" value="{{ $setting ? $setting->tahun : '' }}"
                                                    placeholder="Masukan tahun aplikasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="copyright" class="required">Hak Cipta</label>
                                        <input type="text" class="form-control" name="copyright"
                                            value="{{ $setting ? $setting->copyright : '' }}"
                                            placeholder="Masukan Copyright" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="simpleinput" class="required">Logo</label>
                                        <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                diizinkan: JPG, JPEG, PNG.</small></p>
                                        <input type="file" class="form-control-file" id="imageInput" name="logo"
                                            accept="image/*" onchange="previewImage()"
                                            value="{{ $setting ? asset('assets/' . $setting->logo) : '' }}">
                                        @if ($setting && $setting->logo)
                                            <img id="preview" src="{{ asset($setting->logo) }}" alt="Preview Image"
                                                height="80" width="80" style="display: block;">
                                        @else
                                            <h5 class="text-muted mt-4">Belum Ada Logo</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary float-right" type="submit">Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="{{ route('tentang-kami.update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card shadow-smooth custom-card">
                                <div class="card-header text-center">
                                    <strong>Tentang Kami</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="judul" class="required">Judul</label>
                                        <input type="text" class="form-control" name="judul"
                                            value="{{ $about ? $about->judul : '' }}" placeholder="Masukan judul"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="required">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="15" required>{{ $about ? $about->deskripsi : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary float-right" type="submit">Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
