@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-smooth custom-card">
            <div class="card-body">
                <form action="{{ route('lowongan.update', $lowongan->id) }}" id="form-lowongan" method="POST"
                    class="needs-validation mb-5" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group mb-4">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    value="{{ old('nama_perusahaan', $lowongan->nama_perusahaan) }}" required disabled>
                            </div>
                            <div class="form-group mb-4">
                                <label for="posisi_pekerjaan">Posisi Pekerjaan</label>
                                <input type="text" class="form-control" name="posisi_pekerjaan"
                                    value="{{ old('posisi_pekerjaan', $lowongan->posisi_pekerjaan) }}" required disabled>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea name="deskripsi_pekerjaan" id="" cols="30" rows="8" class="form-control" required
                                    disabled>{{ old('deskripsi_pekerjaan', $lowongan->deskripsi_pekerjaan) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="persyaratan_pekerjaan">Persyaratan</label>
                                <textarea name="persyaratan_pekerjaan" id="persyaratan_pekerjaan" class="form-control" cols="30" rows="10"
                                    hidden>{!! old('persyaratan_pekerjaan', $lowongan->persyaratan_pekerjaan) !!}</textarea>
                                <div id="editor-persyaratan_pekerjaan" style="min-height: 250px;" class="bg-white">
                                    {!! old('persyaratan_pekerjaan', $lowongan->persyaratan_pekerjaan) !!}</div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="provinsi_{{ $lowongan->id }}">Lokasi Perusahaan</label>
                                <select id="provinsi_{{ $lowongan->id }}" name="provinsi_id" class="form-control"
                                    data-id="{{ $lowongan->id }}" disabled>
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}"
                                            {{ $lowongan->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                                            {{ $provinsi->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{-- <label for="kabupaten_{{ $lowongan->id }}">Kabupaten / Kota</label> --}}
                                <select id="kabupaten_{{ $lowongan->id }}" name="kabupaten_id" class="form-control"
                                    data-selected-id="{{ $lowongan->kabupaten_id }}" disabled>
                                    <option value="">-- Pilih Kabupaten / Kota --</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="lokasi_pekerjaan">Detail Lokasi</label>
                                <textarea name="lokasi_pekerjaan" id="" cols="30" rows="4" class="form-control" required disabled>{{ old('lokasi_pekerjaan', $lowongan->lokasi_pekerjaan) }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="waktu_mulai">Jam Mulai</label>
                                        <input type="time" class="form-control" name="waktu_mulai"
                                            value="{{ old('waktu_mulai', $lowongan->waktu_mulai) }}" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="waktu_selesai">Jam Selesai</label>
                                        <input type="time" class="form-control" name="waktu_selesai"
                                            value="{{ old('waktu_selesai', $lowongan->waktu_selesai) }}" required disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="hari_kerja_mulai">Hari Kerja</label>
                                        <select name="hari_kerja_mulai" id="" class="form-control" disabled>
                                            <option value="" disabled>Pilih Hari</option>
                                            <option value="Senin"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Senin' ? 'selected' : '' }}>
                                                Senin</option>
                                            <option value="Selasa"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Selasa' ? 'selected' : '' }}>
                                                Selasa</option>
                                            <option value="Rabu"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Rabu' ? 'selected' : '' }}>
                                                Rabu</option>
                                            <option value="Kamis"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Kamis' ? 'selected' : '' }}>
                                                Kamis</option>
                                            <option value="Jum'at"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Jum\'at' ? 'selected' : '' }}>
                                                Jum'at</option>
                                            <option value="Sabtu"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Sabtu' ? 'selected' : '' }}>
                                                Sabtu</option>
                                            <option value="Minggu"
                                                {{ old('hari_kerja_mulai', $lowongan->hari_kerja_mulai) == 'Minggu' ? 'selected' : '' }}>
                                                Minggu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="hari_kerja_selesai">Hari Selesai</label>
                                        <select name="hari_kerja_selesai" id="" class="form-control" disabled>
                                            <option value="" disabled>Pilih Hari</option>
                                            <option value="Senin"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Senin' ? 'selected' : '' }}>
                                                Senin</option>
                                            <option value="Selasa"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Selasa' ? 'selected' : '' }}>
                                                Selasa</option>
                                            <option value="Rabu"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Rabu' ? 'selected' : '' }}>
                                                Rabu</option>
                                            <option value="Kamis"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Kamis' ? 'selected' : '' }}>
                                                Kamis</option>
                                            <option value="Jum'at"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Jum\'at' ? 'selected' : '' }}>
                                                Jum'at</option>
                                            <option value="Sabtu"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Sabtu' ? 'selected' : '' }}>
                                                Sabtu</option>
                                            <option value="Minggu"
                                                {{ old('hari_kerja_selesai', $lowongan->hari_kerja_selesai) == 'Minggu' ? 'selected' : '' }}>
                                                Minggu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="tanggal_berakhir">Tanggal Berakhir Post</label>
                                <input type="date" class="form-control" name="tanggal_berakhir"
                                    value="{{ old('tanggal_berakhir', $lowongan->tanggal_berakhir) }}" required disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary btn-block" href="{{ route('lowongan.index') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                theme: 'snow',
                readOnly: 'true',
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
                        kabupatenDropdown.prop('disabled', true);
                    });
                } else {
                    kabupatenDropdown.prop('disabled', true);
                }
            }

            // Event listener untuk setiap dropdown provinsi
            $('[id^="provinsi_"]').each(function() {
                const provinsiDropdown = $(this);
                const kabupatenDropdown = $(`#kabupaten_${provinsiDropdown.data('id')}`);

                // Muat kabupaten jika ada provinsi yang terpilih
                if (provinsiDropdown.val()) {
                    loadKabupaten(provinsiDropdown.val(), kabupatenDropdown, kabupatenDropdown.data(
                        'selected-id'));
                }

                // Ketika dropdown provinsi berubah
                provinsiDropdown.change(function() {
                    const provinsiId = $(this).val();
                    loadKabupaten(provinsiId, kabupatenDropdown);
                });
            });
        });
    </script>
@endsection
