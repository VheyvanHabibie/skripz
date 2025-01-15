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
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data Mahasiswa</li>
                        </ol>
                    </nav>
                    {{-- Error Validation --}}
                    <x-error-validation-message errors="$errors" />
                    <div class="col-md-12">
                        <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow-smooth custom-card mb-4 ">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-3 border-right">
                                            <div class="form-group">
                                                <div class="profile-picture-container">
                                                    <center>
                                                        <img id="profile-picture-preview"
                                                            src="{{ asset('assets/images/Profiledefault.png') }}"
                                                            alt="Profile Picture" height="100"
                                                            width="100"style="display: none;">
                                                    </center>
                                                </div>
                                                <p class="text-muted text-center mt-2"><small>Ukuran gambar maksimum: 2MB.
                                                        Format
                                                        gambar yang
                                                        diizinkan: JPG, JPEG, PNG.</small></p>
                                                <input type="file" name="foto" id="profile-picture-input"
                                                    class="form-control-file" accept="image/*"
                                                    onchange="previewProfilePicture()" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="required">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="required">Email</label>
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="jenis_kelamin"
                                                        class="custom-control-input" value="Laki-Laki" required>
                                                    <label class="custom-control-label" for="customRadio1">Laki-Laki
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="jenis_kelamin"
                                                        class="custom-control-input"value="Perempuan" required>
                                                    <label class="custom-control-label" for="customRadio2">Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="required">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="4" required></textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="no_telepon" class="required">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="no_telepon" required
                                                    placeholder="Contoh : 081234567890"
                                                    onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                    min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="nim" class="required">NIM</label>
                                                <input type="text" class="form-control" name="nim" required
                                                    placeholder="Maksimal : 18 Digit"
                                                    onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 18)"
                                                    min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan_id" class="required">Jurusan</label>
                                                <select class="form-control select2" id="jurusan_id" name="jurusan_id"
                                                    required>
                                                    @foreach ($jurusan as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama_jurusan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenjang_pendidikan" class="required">Jenjang
                                                    Pendidikan</label>
                                                <select class="custom-select" id="jenjang_pendidikan"
                                                    name="jenjang_pendidikan" required>
                                                    <option value="" hidden>Pilih Jenjang Pendidikan</option>
                                                    <option value="S1">S1</option>
                                                    <option value="D3">D3</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_masuk" class="required">Tanggal Bergabung</label>
                                                <input type="date" class="form-control" name="tanggal_masuk" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- ./card-text -->
                                <div class="card-footer">
                                    <button class="btn mb-0 btn-primary float-right" type="submit">Simpan
                                    </button>
                                </div>
                            </div> <!-- /.card -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
