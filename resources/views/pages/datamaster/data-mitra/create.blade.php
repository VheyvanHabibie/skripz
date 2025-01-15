@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('datamaster.index') }} ">Data Induk</a></li>
                        <li class="breadcrumb-item"><a href=" {{ route('mitra.index') }} ">Data Mitra Industri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Mitra Industri</li>
                    </ol>
                </nav>
                {{-- Error Validation --}}
                <x-error-validation-message errors="$errors" />

                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        <form action="{{ route('mitra.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_mitra" class="required">Nama Mitra</label>
                                            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang_usaha" class="required">Bidang Usaha</label>
                                            <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_mitra" class="required">Alamat</label>
                                            <textarea class="form-control" id="alamat_mitra" name="alamat_mitra"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_mitra" class="required">Email Mitra</label>
                                            <input type="email" class="form-control" id="email_mitra" name="email_mitra"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon_mitra" class="required">No Telepon Mitra</label>
                                            <input type="number" class="form-control" id="no_telepon_mitra"
                                                onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                min="0" pattern="^08\d{9,}$" placeholder="Contoh: 081234567890"
                                                name="no_telepon_mitra" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="website" class="required">Website</label>
                                            <input type="text" class="form-control" id="website" name="website"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="penanggung_jawab" class="required">Penanggung Jawab</label>
                                            <input type="text" class="form-control" id="penanggung_jawab"
                                                name="penanggung_jawab" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jabatan_pj" class="required">Jabatan Penanggung Jawab</label>
                                            <input type="text" class="form-control" id="jabatan_pj" name="jabatan_pj"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_pj" class="required">Email Penanggung Jawab</label>
                                            <input type="email" class="form-control" id="email_pj" name="email_pj"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon_pj" class="required">No Telepon Penanggung Jawab</label>
                                            <input type="number" class="form-control" id="no_telepon_pj"
                                                onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)"
                                                min="0" pattern="^08\d{9,}$" placeholder="Contoh: 081234567890"
                                                name="no_telepon_pj" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="required">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="profile-picture-input" class="required">Logo</label>
                                            <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                                    diizinkan: JPG, JPEG, PNG.</small></p>
                                            <input type="file" name="logo" id="profile-picture-input"
                                                class="form-control-file" accept="image/*"
                                                onchange="previewProfilePicture()" required>
                                            <br>
                                            <div class="profile-picture-container">
                                                <img id="profile-picture-preview"
                                                    src="{{ asset('assets/images/Profiledefault.png') }}"
                                                    alt="Profile Picture" height="80"
                                                    width="80"style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn mb-2 btn-primary">Simpan</button>
                            </div>
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
