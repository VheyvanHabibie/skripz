<div class="step" id="step2">
    <div class="card">
        <div class="card-body">
            <form id="formDataPekerjaan" method="POST">
                @csrf
                <h3 class="mb-3">Pengalaman Kerja</h3>
                <div class="accordion w-100" id="accordion1">
                    <div class="card shadow mb-3">
                        <div class="card-header" id="heading1">
                            <a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1"
                                aria-expanded="true" aria-controls="collapse1" class="text-dark text-decoration-none">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>Pengalaman Kerja 1</strong>
                                    <i class="fe fe-plus fe-16"></i>
                                </div>
                            </a>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion1"
                            style="">
                            <div class="card-body">
                                <input type="hidden" id="data_experience_id" name="data_experience_id"
                                    value="{{ $dataExperience->id ?? '' }}">
                                <input type="hidden" name="personal_id" id="personal_id">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                        <input type="text" name="nama_perusahaan[]" class="form-control"
                                            value="{{ old('nama_perusahaan', $dataExperience->nama_perusahaan ?? '') }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jabatan">Jabatan/Magang/Posisi</label>
                                        <input type="text" name="jabatan[]" class="form-control"
                                            value="{{ old('jabatan', $dataExperience->jabatan ?? '') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_perusahaan">Lokasi Perusahaan(Kota, Negara)</label>
                                    <input type="text" name="lokasi_perusahaan[]" class="form-control"
                                        value="{{ old('lokasi_perusahaan', $dataExperience->lokasi_perusahaan ?? '') }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_perusahaan">Deskripsi perusahaan
                                        (Opsional)</label>
                                    <textarea name="deskripsi_perusahaan[]" rows="6" class="form-control">{{ old('deskripsi_perusahaan', $dataExperience->deskripsi_perusahaan ?? '') }}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bulan_mulai_experience">Tanggal Mulai (Bulan)</label>
                                        <select name="bulan_mulai_experience[]" id="bulan_mulai_experience" class="form-control" required>
                                            <option value="">Pilih Bulan</option>
                                            @php
                                                $bulanMulaiExperience = old('bulan_mulai_experience', $dataExperience['bulan_mulai_experience'] ?? '');
                                            @endphp
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                <option value="{{ $bulan }}" {{ $bulanMulaiExperience == $bulan ? 'selected' : '' }}>
                                                    {{ $bulan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tahun_mulai_experience">Tanggal Mulai (Tahun)</label>
                                        <select name="tahun_mulai_experience[]" id="tahun_mulai_experience" class="form-control" required>
                                            <option value="">Pilih Tahun</option>
                                            @php
                                                $tahunMulaiExperience = old('tahun_mulai_experience', $dataExperience['tahun_mulai_experience'] ?? '');
                                            @endphp
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}" {{ $tahunMulaiExperience == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bulan_selesai_experience">Tanggal Selesai (Bulan)</label>
                                        <select name="bulan_selesai_experience[]" id="bulan_selesai_experience" class="form-control">
                                            <option value="">Pilih Bulan</option>
                                            @php
                                                $bulanSelesaiExperience = old('bulan_selesai_experience', $dataExperience['bulan_selesai_experience'] ?? '');
                                            @endphp
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                <option value="{{ $bulan }}" {{ $bulanSelesaiExperience == $bulan ? 'selected' : '' }}>
                                                    {{ $bulan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tahun_selesai_experience">Tanggal Selesai (Tahun)</label>
                                        <select name="tahun_selesai_experience[]" id="tahun_selesai_experience" class="form-control">
                                            <option value="">Pilih Tahun</option>
                                            @php
                                                $tahunSelesaiExperience = old('tahun_selesai_experience', $dataExperience['tahun_selesai_experience'] ?? '');
                                            @endphp
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}" {{ $tahunSelesaiExperience == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            name="is_current[]">
                                        <label class="custom-control-label font-weight-bold" for="customCheck1">Tempat
                                            Bekerja Saat Ini</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="portofolio_kerja">Portofolio Kerja dan Prestasi</label>
                                    <textarea name="portofolio_kerja[]" id="konten1" class="form-control" cols="30" rows="10" hidden>{!! old('portofolio_kerja', $dataExperience->portofolio_kerja ?? '') !!}</textarea>
                                    <div id="editor-konten-1" style="min-height: 250px;" class="bg-white">
                                        {!! old('portofolio_kerja', $dataExperience->portofolio_kerja ?? '') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-info btn-block mb-3" onclick="addExperience()"><i
                        class="fe fe-plus"></i>Tambah Pengalaman Kerja</button>
                <div class="form-group float-right">
                    <button type="button" class="btn btn-outline-primary" onclick="prevStep()">Kembali</button>
                    <button type="button" class="btn btn-primary" id="submitButton">Simpan &
                        Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
