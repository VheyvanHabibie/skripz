@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
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
                        <div class="card shadow-smooth custom-card mb-4 ">
                            <div class="card-body ">
                                @if (Auth::user()->role_id == 1)
                                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <center>
                                            @if (Auth::user()->foto)
                                                <div class="avatar avatar-xl mt-4">
                                                    <img id="preview" src="{{ asset(Auth::user()->foto) }}"
                                                        alt="Preview Image" class="avatar-img rounded-circle mb-2"
                                                        style="display: block;">
                                                </div>
                                            @else
                                                <h5 class="text-muted mt-4 mb-2">Belum Ada foto</h5>
                                            @endif
                                            <div class="form-group">
                                                <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" class="form-control-file" id="imageInput"
                                                    name="foto" accept="image/*" onchange="previewImage()"
                                                    value="{{ asset(Auth::user()->foto) }}">
                                            </div>
                                        </center>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="name" class="required">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ Auth::user()->name }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email" class="required">Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}" required>
                                            </div>
                                        </div>
                                        <button class="btn mb-0 btn-primary" style="float: right;" type="submit">Simpan
                                        </button>
                                    </form>
                                @elseif (Auth::user()->role_id == 3)
                                    <form action="{{ route('profile-dosen.update', Auth::user()->dosen->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <center>
                                            @if (Auth::user()->dosen->foto)
                                                <img id="preview" src="{{ asset(Auth::user()->dosen->foto) }}"
                                                    alt="Preview Image" class="mb-2" height="80" width="80"
                                                    style="display: block;">
                                            @else
                                                <h5 class="text-muted mt-4 mb-2">Belum Ada foto</h5>
                                            @endif
                                            <div class="form-group">
                                                <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" class="form-control-file" id="imageInput"
                                                    name="foto" accept="image/*" onchange="previewImage()"
                                                    value="{{ asset(Auth::user()->dosen->foto) }}">
                                            </div>
                                        </center>
                                        <br>
                                        <div class="form-group">
                                            <label for="nama_dosen" class="required">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_dosen"
                                                value="{{ Auth::user()->dosen->nama_dosen }}" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{ Auth::user()->dosen->tempat_lahir ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir"
                                                        value="{{ Auth::user()->dosen->tanggal_lahir ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="jenis_kelamin"
                                                        class="custom-control-input" value="Laki-Laki"
                                                        {{ Auth::user()->dosen->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customRadio1">Laki-Laki
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="jenis_kelamin"
                                                        class="custom-control-input"value="Perempuan"
                                                        {{ Auth::user()->dosen->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customRadio2">Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="alamat" class="required">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="4">{{ Auth::user()->dosen->alamat ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nip_dosen" class="required">NIP</label>
                                                <input type="text" class="form-control" name="nip_dosen"
                                                    value="{{ Auth::user()->dosen->nip_dosen ?? '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jurusan" class="required">Jurusan</label>
                                                <input type="text" class="form-control" name="jurusan"
                                                    value="{{ Auth::user()->dosen->jurusan ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="required">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ Auth::user()->dosen->email }}" required>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_telepon" class="required">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="no_telepon"
                                                    value="{{ Auth::user()->dosen->no_telepon ?? '' }}">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="akun_link">Akun LinkedIn (Opsional)</label>
                                            <textarea class="form-control" id="akun_link" name="akun_link">{{ Auth::user()->dosen->akun_link }}</textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jabatan_id" class="required">Jabatan</label>
                                                <select class="form-control select2" id="jabatan_id" name="jabatan_id"
                                                    required>
                                                    @foreach ($jabatan as $data)
                                                        @if (old('jabatan_id', $data->id) ?? 0 == Auth::user()->dosen->jabatan->id)
                                                            <option value="{{ $data->id }}" selected hidden>
                                                                {{ $data->nama_jabatan }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $data->id }}">{{ $data->nama_jabatan }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bidang_keahlian" class="required">Bidang Keahlian</label>
                                                <select class="form-control select2-multi" id="bidang_keahlian"
                                                    name="bidang_keahlian[]" multiple required>
                                                    @foreach ($bidkeahlian as $data)
                                                        @php
                                                            $selected = false;
                                                            if (Auth::user()->dosen->bidang_keahlian) {
                                                                $bidangKeahlian = json_decode(
                                                                    Auth::user()->dosen->bidang_keahlian,
                                                                );
                                                                $selected = in_array(
                                                                    $data->nama_keahlian,
                                                                    $bidangKeahlian,
                                                                );
                                                            }
                                                        @endphp
                                                        <option value="{{ $data->nama_keahlian }}"
                                                            {{ $selected ? 'selected' : '' }}>
                                                            {{ $data->nama_keahlian }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="keilmuan_id" class="required">Kelompok Keilmuan</label>
                                                <div class="form-row">
                                                    @foreach ($keilmuan as $data)
                                                        <div class="col-auto">
                                                            <div class="custom-control custom-radio  mb-2">
                                                                <input type="radio" class="custom-control-input"
                                                                    id="{{ $data->nama_keilmuan }}" name="keilmuan_id"
                                                                    value="{{ $data->id }}" required
                                                                    {{ Auth::user()->dosen->keilmuan_id == $data->id ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="{{ $data->nama_keilmuan }}">{{ $data->nama_keilmuan }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status_dosen" class="required">Status Dosen</label>
                                                <select class="custom-select" id="status_dosen" name="status_dosen"
                                                    required>
                                                    <option value="" hidden>Pilih Status</option>
                                                    <option value="Aktif"
                                                        @if (Auth::user()->dosen->status_dosen == 'Aktif') selected @endif>
                                                        Aktif
                                                    </option>
                                                    <option value="Tidak Aktif"
                                                        @if (Auth::user()->dosen->status_dosen == 'Tidak Aktif') selected @endif>Tidak
                                                        Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h6 class="text-center mt-4">
                                            Isi Salah Satu
                                        </h6>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="signature" class="required">Tanda Tangan</label>
                                                <br />
                                                <div id="sig"></div>
                                                <br /><br />
                                                <button id="clear" class="btn btn-danger btn-sm">Clear</button>
                                                <textarea id="signature" name="paraf" style="display: none" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="parafinput" class="required">Upload Tanda Tangan</label>
                                                <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar
                                                        yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" class="form-control-file mb-4" id="imageInputs"
                                                    name="paraf" accept="image/*" onchange="previewImages()"
                                                    value="{{ Auth::user()->dosen ? asset(Auth::user()->dosen->paraf) : '' }}">
                                                @if (Auth::user()->dosen && Auth::user()->dosen->paraf)
                                                    <img id="previews" src="{{ asset(Auth::user()->dosen->paraf) }}"
                                                        alt="Preview Image" height="100" width="100"
                                                        style="display: block;">
                                                @else
                                                    <h5 class="text-muted mt-4">Belum Ada Tanda Tangan</h5>
                                                @endif
                                            </div>
                                        </div>

                                        <button class="btn mb-0 btn-primary" style="float: right;" type="submit">Simpan
                                        </button>
                                    </form>
                                @elseif (Auth::user()->role_id == 4)
                                    <form action="{{ route('profile-mahasiswa.update', Auth::user()->mahasiswa->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <center>
                                            @if (Auth::user()->mahasiswa->foto)
                                                <img id="preview" src="{{ asset(Auth::user()->mahasiswa->foto) }}"
                                                    alt="Preview Image" class="mb-2" height="80" width="80"
                                                    style="display: block;">
                                            @else
                                                <h5 class="text-muted mt-4 mb-2">Belum Ada foto</h5>
                                            @endif
                                            <div class="form-group">
                                                <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar
                                                        yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" class="form-control-file" id="imageInput"
                                                    name="foto" accept="image/*" onchange="previewImage()"
                                                    value="{{ asset(Auth::user()->mahasiswa->foto) }}">
                                            </div>
                                        </center>
                                        <br>
                                        <div class="form-group">
                                            <label for="name" class="required">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->mahasiswa->name }}" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{ Auth::user()->mahasiswa->tempat_lahir ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir"
                                                        value="{{ Auth::user()->mahasiswa->tanggal_lahir ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="jenis_kelamin"
                                                        class="custom-control-input" value="Laki-Laki"
                                                        {{ Auth::user()->mahasiswa->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customRadio1">Laki-Laki
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="jenis_kelamin"
                                                        class="custom-control-input"value="Perempuan"
                                                        {{ Auth::user()->mahasiswa->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customRadio2">Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="alamat" class="required">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="4">{{ Auth::user()->mahasiswa->alamat ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nim" class="required">NIM</label>
                                                <input type="text" class="form-control" name="nim"
                                                    value="{{ Auth::user()->mahasiswa->nim ?? '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jurusan_id" class="required">Jurusan</label>
                                                <select class="form-control select2" id="jurusan_id" name="jurusan_id"
                                                    required>
                                                    @foreach ($jurusan as $data)
                                                        @if (old('jurusan_id', $data->id) == Auth::user()->jurusan_id)
                                                            <option value="{{ $data->id }}" selected hidden>
                                                                {{ $data->nama_jurusan }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $data->id }}">{{ $data->nama_jurusan }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="required">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ Auth::user()->mahasiswa->email }}" required>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_telepon" class="required">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="no_telepon"
                                                    value="{{ Auth::user()->mahasiswa->no_telepon ?? '' }}">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jenjang_pendidikan" class="required">Jenjang
                                                        Pendidikan</label>
                                                    <select class="custom-select" id="jenjang_pendidikan"
                                                        name="jenjang_pendidikan">
                                                        <option value="" hidden>Pilih Jenjang Pendidikan</option>
                                                        <option value="S1"
                                                            @if (Auth::user()->mahasiswa->jenjang_pendidikan == 'S1') selected @endif>S1</option>
                                                        <option value="D3"
                                                            @if (Auth::user()->mahasiswa->jenjang_pendidikan == 'D3') selected @endif>D3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_masuk" class="required">Tanggal Bergabung</label>
                                                    <input type="date" class="form-control" name="tanggal_masuk"
                                                        value="{{ Auth::user()->mahasiswa->tanggal_masuk ?? '' }}">
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn mb-0 btn-primary" style="float: right;" type="submit">Simpan
                                        </button>
                                    </form>
                                @elseif (Auth::user()->role_id == 6)
                                    <form action="{{ route('profile-mitra.update', Auth::user()->mitra->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <center>
                                            @if (Auth::user()->mitra->logo)
                                                <img id="preview" src="{{ asset(Auth::user()->mitra->logo) }}"
                                                    alt="Preview Image" class="mb-2" height="80" width="80"
                                                    style="display: block;">
                                            @else
                                                <h5 class="text-muted mt-4 mb-2">Belum Ada logo</h5>
                                            @endif
                                            <div class="form-group">
                                                <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar
                                                        yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" class="form-control-file" id="imageInput"
                                                    name="logo" accept="image/*" onchange="previewImage()"
                                                    value="{{ asset(Auth::user()->mitra->logo) }}">
                                            </div>
                                        </center>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_mitra" class="required">Nama Mitra</label>
                                                <input type="text" class="form-control" id="nama_mitra"
                                                    name="nama_mitra" value="{{ Auth::user()->mitra->nama_mitra }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bidang_usaha" class="required">Bidang Usaha</label>
                                                <input type="text" class="form-control" id="bidang_usaha"
                                                    name="bidang_usaha" value="{{ Auth::user()->mitra->bidang_usaha }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_mitra" class="required">Alamat</label>
                                            <textarea class="form-control" id="alamat_mitra" name="alamat_mitra" rows="4" required>{{ Auth::user()->mitra->alamat_mitra }} </textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="email_mitra" class="required">Email Mitra</label>
                                                <input type="email" class="form-control" id="email_mitra"
                                                    name="email_mitra" value="{{ Auth::user()->mitra->email_mitra }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_telepon_mitra" class="required">No Telepon Mitra</label>
                                                <input type="text" class="form-control" id="no_telepon_mitra"
                                                    onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                    min="0" pattern="^08\d{9,}$"
                                                    placeholder="Contoh: 081234567890" name="no_telepon_mitra"
                                                    value="{{ Auth::user()->mitra->no_telepon_mitra }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="website" class="required">Website</label>
                                            <input type="text" class="form-control" id="website" name="website"
                                                value="{{ Auth::user()->mitra->website }}" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="penanggung_jawab" class="required">Penanggung Jawab</label>
                                                <input type="text" class="form-control" id="penanggung_jawab"
                                                    name="penanggung_jawab"
                                                    value="{{ Auth::user()->mitra->penanggung_jawab }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jabatan_pj" class="required">Jabatan Penanggung Jawab</label>
                                                <input type="text" class="form-control" id="jabatan_pj"
                                                    name="jabatan_pj" value="{{ Auth::user()->mitra->jabatan_pj }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="email_pj" class="required">Email Penanggung Jawab</label>
                                                <input type="email" class="form-control" id="email_pj"
                                                    name="email_pj" value="{{ Auth::user()->mitra->email_pj }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_telepon_pj" class="required">No Telepon Penanggung
                                                    Jawab</label>
                                                <input type="text" class="form-control" id="no_telepon_pj"
                                                    onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                    min="0" pattern="^08\d{9,}$"
                                                    placeholder="Contoh: 081234567890" name="no_telepon_pj"
                                                    value="{{ Auth::user()->mitra->no_telepon_pj }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="required">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi">{{ Auth::user()->mitra->deskripsi }}</textarea>
                                        </div>


                                        <button class="btn mb-0 btn-primary" style="float: right;" type="submit">Simpan
                                        </button>
                                    </form>
                                @elseif (Auth::user()->role_id == 5)
                                    <form
                                        action="{{ route('profile-sekretariat.update', Auth::user()->sekretariat->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <center>
                                            @if (Auth::user()->foto)
                                                <img id="preview" src="{{ asset(Auth::user()->foto) }}"
                                                    alt="Preview Image" class="mb-2" height="80" width="80"
                                                    style="display: block;">
                                            @else
                                                <h5 class="text-muted mt-4 mb-2">Belum Ada foto</h5>
                                            @endif
                                            <div class="form-group">
                                                <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar
                                                        yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" class="form-control-file" id="imageInput"
                                                    name="foto" accept="image/*" onchange="previewImage()"
                                                    value="{{ asset(Auth::user()->foto) }}">
                                            </div>
                                        </center>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_sekretariat" class="required">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_sekretariat"
                                                    value="{{ Auth::user()->sekretariat->nama_sekretariat }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email" class="required">Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nip" class="required">NIP</label>
                                                <input type="number" class="form-control" name="nip"
                                                    value="{{ Auth::user()->sekretariat->nip }}"
                                                    placeholder="Maksimal : 18 Digit"
                                                    onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 18)"
                                                    min="0" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jabatan_id" class="required">Jabatan</label>
                                                <select class="form-control select2" id="jabatan_id" name="jabatan_id"
                                                    required>
                                                    @foreach ($jabatan as $data)
                                                        @if (old('jabatan_id', $data->id) ?? 0 == Auth::user()->sekretariat->jabatan->id)
                                                            <option value="{{ $data->id }}" selected hidden>
                                                                {{ $data->nama_jabatan }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $data->id }}">{{ $data->nama_jabatan }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon" class="required">Nomor Telepon</label>
                                            <input type="number" class="form-control" name="no_telepon"
                                                value="{{ Auth::user()->sekretariat->no_telepon }}"
                                                placeholder="Contoh : 081234567890" onkeypress="return hanyaAngka(event)"
                                                oninput="limitDigit(event, 13)" min="0" required>
                                        </div>
                                        <button class="btn mb-0 btn-primary" style="float: right;" type="submit">Simpan
                                        </button>
                                    </form>
                                @endif
                            </div> <!-- ./card-text -->
                        </div> <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endsection
