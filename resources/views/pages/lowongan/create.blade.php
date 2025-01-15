@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <x-error-validation-message errors="$errors" />

        {{-- Alert Message --}}
        @if (session()->has('success'))
            <div class="row">
                <div class="col-md-12">
                    <x-success-message action="{{ session()->get('success') }}" />
                </div>
            </div>
        @endif
        <div class="card shadow-smooth custom-card">
            <div class="card-body">
                <form action="{{ route('lowongan.store') }}" id="form-lowongan" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group mb-4">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="posisi_pekerjaan">Posisi Pekerjaan</label>
                                <input type="text" class="form-control" name="posisi_pekerjaan" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea name="deskripsi_pekerjaan" id="" cols="30" rows="8" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="persyaratan_pekerjaan">Persyaratan </label>
                                <textarea name="persyaratan_pekerjaan" id="persyaratan_pekerjaan" class="form-control" cols="30" rows="10"
                                    hidden></textarea>
                                <div id="editor-persyaratan_pekerjaan" style="min-height: 250px;" class=" bg-white"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                                <div class="form-group">
                                    <label for="provinsi_id">Lokasi Perusahaan</label>
                                    <select id="provinsi" name="provinsi_id" class="form-control select2">
                                        <option value="">-- Pilih Provinsi --</option>
                                        @foreach ($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="kabupaten_id">&nbsp;</label> --}}
                                    <select id="kabupaten" name="kabupaten_id" disabled class="form-control select2">
                                        <option value="">-- Pilih Kabupaten --</option>
                                    </select>
                                </div>
                            <div class="form-group mb-4">
                                <label for="lokasi_pekerjaan">Detail Lokasi</label>
                                <textarea name="lokasi_pekerjaan" id="" cols="30" rows="4" class="form-control" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="waktu_mulai">Jam Mulai</label>
                                        <input type="time" class="form-control" name="waktu_mulai" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="waktu_selesai">Jam Selesai</label>
                                        <input type="time" class="form-control" name="waktu_selesai" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="hari_kerja_mulai">Hari Kerja</label>
                                        <select name="hari_kerja_mulai" id="" class="form-control">
                                            <option value="" disabled selected>Pilih Hari</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jum'at">Jum'at</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="hari_kerja_selesai">Hari Selesai</label>
                                        <select name="hari_kerja_selesai" id="" class="form-control">
                                            <option value="" disabled selected>Pilih Hari</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jum'at">Jum'at</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="tanggal_berakhir">Tanggal Berakhir Post</label>
                                <input type="date" class="form-control" name="tanggal_berakhir" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Quill untuk setiap editor
            var quill1 = new Quill('#editor-persyaratan_pekerjaan', {
                modules: {
                    toolbar: [
                        [{
                            'font': []
                        }],
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'direction': 'rtl'
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image', 'video'],
                        ['clean'],
                        ['emoji']
                    ]
                },
                theme: 'snow'
            });
            var form1 = document.getElementById('form-lowongan');
            form1.addEventListener('submit', function() {
                document.getElementById('persyaratan_pekerjaan').value = quill1.root.innerHTML;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat Kabupaten berdasarkan Provinsi
            function loadKabupaten(provinsiId, kabupatenDropdown, selectedKabupatenId = null) {
                kabupatenDropdown.empty().append('<option value="">-- Pilih Kabupaten / Kota --</option>');
                if (provinsiId) {
                    $.get(`/get-kabupaten/${provinsiId}`, function(data) {
                        data.forEach(item => {
                            kabupatenDropdown.append(
                                `<option value="${item.id}" ${selectedKabupatenId == item.id ? 'selected' : ''}>${item.type} ${item.name}</option>`
                            );
                        });
                        kabupatenDropdown.prop('disabled', false);
                    });
                } else {
                    kabupatenDropdown.prop('disabled', true);
                }
            }

            // Skrip untuk elemen dropdown global (jika ada dropdown dengan ID tetap)
            $('#provinsi').change(function() {
                const provinsiId = $(this).val();
                const kabupatenDropdown = $('#kabupaten');
                kabupatenDropdown.empty().append('<option value="">-- Pilih Kabupaten / Kota --</option>');

                if (provinsiId) {
                    kabupatenDropdown.prop('disabled', false);
                    $.get(`/get-kabupaten/${provinsiId}`, function(data) {
                        data.forEach(kabupaten => {
                            kabupatenDropdown.append(
                                `<option value="${kabupaten.id}">${kabupaten.type} ${kabupaten.name}</option>`
                            );
                        });
                    });
                } else {
                    kabupatenDropdown.prop('disabled', true);
                }
            });
        });
    </script>
@endsection
