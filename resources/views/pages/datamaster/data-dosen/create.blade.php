@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('datamaster.index') }} ">Data Induk</a></li>
                        <li class="breadcrumb-item"><a href=" {{ route('dosen.index') }} ">Data Dosen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Dosen</li>
                    </ol>
                </nav>
                {{-- Error Validation --}}
                <x-error-validation-message errors="$errors" />
                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip_dosen" class="required">NIP</label>
                                            <input type="text" class="form-control" id="nip_dosen" name="nip_dosen"
                                                placeholder="Maksimal : 18 Digit" onkeypress="return hanyaAngka(event)"
                                                oninput="limitDigit(event, 18)" min="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_dosen" class="required">Nama Lengkap dan Gelar</label>
                                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen"
                                                required>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir"
                                                        name="tempat_lahir" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal_lahir"
                                                        name="tanggal_lahir" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="jenis_kelamin"
                                                    class="custom-control-input" value="Laki-Laki" required>
                                                <label class="custom-control-label" for="customRadio1">Laki-Laki </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="jenis_kelamin"
                                                    class="custom-control-input"value="Perempuan" required>
                                                <label class="custom-control-label" for="customRadio2">Perempuan </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="required">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="required">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon" class="required">Nomor Telepon / WhatsApp</label>
                                            <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                                onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                min="0" pattern="^08\d{9,}$" placeholder="Contoh: 081234567890"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="akun_link">Akun LinkedIn (Opsional)</label>
                                            <input type="text" class="form-control" id="akun_link" name="akun_link">
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_id" class="required">Jabatan</label>
                                            <select class="form-control select2" id="jabatan_id" name="jabatan_id"
                                                required>
                                                @foreach ($jabatan as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang_keahlian" class="required">Bidang Keahlian</label>
                                            <select class="form-control select2-multi" id="bidang_keahlian"
                                                name="bidang_keahlian[]" multiple required>
                                                @foreach ($bidkeahlian as $data)
                                                    <option value="{{ $data->nama_keahlian }}">{{ $data->nama_keahlian }}
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
                                                    <option value="{{ $data->id }}">{{ $data->nama_keilmuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status_dosen" class="required">Status Dosen</label>
                                            <select class="custom-select" id="status_dosen" name="status_dosen" required>
                                                <option value="" hidden>Pilih Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="profile-picture-input" class="required">Foto</label>
                                            <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                    diizinkan: JPG, JPEG, PNG.</small></p>
                                            <input type="file" name="foto" id="profile-picture-input"
                                                class="form-control-file" accept="image/*"
                                                onchange="previewProfilePicture()" required>
                                            <br>
                                            <div class="profile-picture-container">
                                                <img id="profile-picture-preview"
                                                    src="{{ asset('assets/images/Profiledefault.png') }}"
                                                    alt="Profile Picture" height="100"
                                                    width="100"style="display: none;">
                                            </div>
                                        </div>
                                        <h6 class="text-center">Input Salah Satu</h6>
                                        <div class="form-group">
                                            <label for="signature" class="required">Buat Tanda Tangan</label>
                                            <br />
                                            <div id="sig"></div>
                                            <br /><br />
                                            <button id="clear" class="btn btn-danger btn-sm">Clear</button>
                                            <textarea id="signature" name="paraf" style="display: none" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="paraf" class="required">Upload Tanda Tangan</label>
                                            <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                    diizinkan: JPG, JPEG, PNG.</small></p>
                                            <input type="file" name="paraf" id="paraf"
                                                class="form-control-file" accept="image/*"
                                                onchange="previewParafPicture()">
                                            <br>
                                            <div class="profile-picture-container">
                                                <img id="paraf-picture-preview"
                                                    src="{{ asset('assets/images/Profiledefault.png') }}"
                                                    alt="Profile Picture" height="100"
                                                    width="100"style="display: none;">
                                            </div>
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
    <script>
        // Fungsi untuk memeriksa apakah input file kosong dan menampilkan gambar default jika ya
        window.onload = function() {
            var input = document.getElementById('profile-picture-input');
            var preview = document.getElementById('profile-picture-preview');

            if (!input.value) {
                preview.src = "{{ asset('assets/images/Profiledefault.png') }}";
            }
        }

        // Fungsi untuk memperbarui pratinjau gambar saat gambar baru dipilih
        function previewProfilePicture() {
            var input = document.getElementById('profile-picture-input');
            var preview = document.getElementById('profile-picture-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "{{ asset('assets/images/Profiledefault.png') }}";
            }
        }
    </script>
    <script>
        // Fungsi untuk memeriksa apakah input file kosong dan menampilkan gambar default jika ya
        window.onload = function() {
            var input = document.getElementById('paraf');
            var preview = document.getElementById('paraf-picture-preview');

            if (!input.value) {
                preview.src = "{{ asset('assets/images/Profiledefault.png') }}";
            }
        }

        // Fungsi untuk memperbarui pratinjau gambar saat gambar baru dipilih
        function previewParafPicture() {
            var input = document.getElementById('paraf');
            var preview = document.getElementById('paraf-picture-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "{{ asset('assets/images/Profiledefault.png') }}";
            }
        }
    </script>
@endsection
