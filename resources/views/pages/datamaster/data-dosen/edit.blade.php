@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('datamaster.index') }} ">Data Induk</a></li>
                        <li class="breadcrumb-item"><a href=" {{ route('dosen.index') }} ">Data Dosen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Dosen</li>
                    </ol>
                </nav>
                {{-- Error Validation --}}
                <x-error-validation-message errors="$errors" />
                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip_dosen" class="col-form-label">NIP</label>
                                            <input type="text" class="form-control" id="nip_dosen" name="nip_dosen"
                                                placeholder="Maksimal : 18 Digit" onkeypress="return hanyaAngka(event)"
                                                oninput="limitDigit(event, 18)" min="0"
                                                value="{{ $dosen->nip_dosen }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_dosen" class="col-form-label">Nama Lengkap dan Gelar</label>
                                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen"
                                                value="{{ $dosen->nama_dosen }}" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir"
                                                        name="tempat_lahir" value="{{ $dosen->tempat_lahir }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal_lahir"
                                                        name="tanggal_lahir" value="{{ $dosen->tanggal_lahir }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="jenis_kelamin"
                                                    class="custom-control-input" value="Laki-Laki" required
                                                    {{ $dosen->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadio1">Laki-Laki </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="jenis_kelamin"
                                                    class="custom-control-input"value="Perempuan" required
                                                    {{ $dosen->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadio2">Perempuan </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="col-form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required>{{ $dosen->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $dosen->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon" class="col-form-label">Nomor Telepon / WhatsApp</label>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                                onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                min="0" pattern="^08\d{9,}$" placeholder="Contoh: 081234567890"
                                                value="{{ $dosen->no_telepon }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="akun_link">Akun LinkedIn (Opsional)</label>
                                            <textarea class="form-control" id="akun_link" name="akun_link">{{ $dosen->akun_link }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_id" class="required">Jabatan</label>
                                            <select class="form-control select2" id="jabatan_id" name="jabatan_id"
                                                required>
                                                @foreach ($jabatan as $data)
                                                    @if (old('jabatan_id', $data->id) == $dosen->jabatan->id)
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
                                        <div class="form-group">
                                            <label for="bidang_keahlian" class="required">Bidang Keahlian</label>
                                            <select class="form-control select2-multi" id="bidang_keahlian"
                                                name="bidang_keahlian[]" multiple required>
                                                @foreach ($bidkeahlian as $data)
                                                    @php
                                                        $selected = false;
                                                        if ($dosen->bidang_keahlian) {
                                                            $bidangKeahlian = json_decode($dosen->bidang_keahlian);
                                                            $selected = in_array($data->nama_keahlian, $bidangKeahlian);
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
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="keilmuan_id" class="required">Keilmuan</label>
                                            <select class="form-control select2" id="keilmuan_id" name="keilmuan_id"
                                                required>
                                                @foreach ($keilmuan as $data)
                                                    @if (old('keilmuan_id', $data->id) == $dosen->keilmuan->id)
                                                        <option value="{{ $data->id }}" selected hidden>
                                                            {{ $data->nama_keilmuan }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $data->id }}">{{ $data->nama_keilmuan }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status_dosen" class="required">Status Dosen</label>
                                            <select class="custom-select" id="status_dosen" name="status_dosen" required>
                                                <option value="" hidden>Pilih Status</option>
                                                <option value="Aktif" @if ($dosen->status_dosen == 'Aktif') selected @endif>
                                                    Aktif
                                                </option>
                                                <option value="Tidak Aktif"
                                                    @if ($dosen->status_dosen == 'Tidak Aktif') selected @endif>Tidak
                                                    Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleinput" class="required">Foto</label>
                                            <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                    diizinkan: JPG, JPEG, PNG.</small></p>
                                            <input type="file" class="form-control-file" id="imageInput"
                                                name="foto" accept="image/*" onchange="previewImage()"
                                                value="{{ $dosen ? asset($dosen->foto) : '' }}">
                                            @if ($dosen && $dosen->foto)
                                                <img id="preview" src="{{ asset($dosen->foto) }}" alt="Preview Image"
                                                    height="100" width="100" style="display: block;">
                                            @else
                                                <h5 class="text-muted mt-4">Belum Ada foto</h5>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="signature" class="required">Tanda Tangan</label>
                                            <br />
                                            <div id="sig"></div>
                                            <br /><br />
                                            <button id="clear" class="btn btn-danger btn-sm">Clear</button>
                                            <textarea id="signature" name="paraf" style="display: none" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="parafinput" class="required">Upload Tanda Tangan</label>
                                            <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                    diizinkan: JPG, JPEG, PNG.</small></p>
                                            <input type="file" class="form-control-file" id="imageInputs"
                                                name="paraf" accept="image/*" onchange="previewImages()"
                                                value="{{ $dosen ? asset($dosen->paraf) : '' }}">
                                            @if ($dosen && $dosen->paraf)
                                                <img id="previews" src="{{ asset($dosen->paraf) }}" alt="Preview Image"
                                                    height="100" width="100" style="display: block;">
                                            @else
                                                <h5 class="text-muted mt-4">Belum Ada Tanda Tangan</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button class="btn mb-2 btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
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
