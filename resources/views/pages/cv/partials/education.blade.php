<div class="step" id="step3">
    <div class="card">
        <div class="card-body">
            <form id="formDataPendidikan" method="POST">
                @csrf
                <h3 class="mb-3">Riwayat Pendidikan</h3>
                <div class="accordion w-100" id="accordion-edu">
                    <div class="card shadow mb-3">
                        <a role="button" href="#collapse-edu" data-toggle="collapse" data-target="#collapse-edu"
                            aria-expanded="true" aria-controls="collapse-edu" class="text-dark text-decoration-none">
                            <div class="card-header" id="heading1">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>Riwayat Pendididikan 1</strong>
                                    <i class="fe fe-plus fe-16"></i>
                                </div>
                            </div>
                        </a>
                        <div id="collapse-edu" class="collapse show" aria-labelledby="heading1" data-parent="#accordion-edu"
                            style="">
                            <div class="card-body">
                                <input type="hidden" id="data_education_id" name="data_education_id"
                                    value="{{ $dataEducation->id ?? '' }}">
                                <input type="hidden" name="personal_id" id="personal_id_1">
                                <div class="form-group">
                                    <label for="nama_sekolah">Nama Sekolah/Universitas</label>
                                    <input type="text" name="nama_sekolah[]" class="form-control"
                                        value="{{ old('nama_sekolah', $dataEducation->nama_sekolah ?? '') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_education">Lokasi Sekolah/Universitas(Kota,
                                        Negara)</label>
                                    <input type="text" name="lokasi_education[]" class="form-control"
                                        value="{{ old('lokasi_sekolah', $dataEducation->lokasi_education ?? '') }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bulan_mulai_education">Tanggal Mulai (Bulan)</label>
                                        <select name="bulan_mulai_education[]" id="bulan_mulai_education" class="form-control" required>
                                            <option value="">Pilih Bulan</option>
                                            @php
                                                $bulanMulaiSelected = old('bulan_mulai_education', $dataEducation['bulan_mulai_education'] ?? '');
                                            @endphp
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                <option value="{{ $bulan }}" {{ $bulanMulaiSelected == $bulan ? 'selected' : '' }}>
                                                    {{ $bulan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tahun_mulai_education">Tanggal Mulai (Tahun)</label>
                                        <select name="tahun_mulai_education[]" id="tahun_mulai_education" class="form-control" required>
                                            <option value="">Pilih Tahun</option>
                                            @php
                                                $tahunMulaiSelected = old('tahun_mulai_education', $dataEducation['tahun_mulai_education'] ?? '');
                                            @endphp
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}" {{ $tahunMulaiSelected == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bulan_selesai_education">Tanggal Selesai (Bulan)</label>
                                        <select name="bulan_selesai_education[]" id="bulan_selesai_education" class="form-control">
                                            <option value="">Pilih Bulan</option>
                                            @php
                                                $bulanSelesaiSelected = old('bulan_selesai_education', $dataEducation['bulan_selesai_education'] ?? '');
                                            @endphp
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                <option value="{{ $bulan }}" {{ $bulanSelesaiSelected == $bulan ? 'selected' : '' }}>
                                                    {{ $bulan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tahun_selesai_education">Tanggal Selesai (Tahun)</label>
                                        <select name="tahun_selesai_education[]" id="tahun_selesai_education" class="form-control">
                                            <option value="">Pilih Tahun</option>
                                            @php
                                                $tahunSelesaiSelected = old('tahun_selesai_education', $dataEducation['tahun_selesai_education'] ?? '');
                                            @endphp
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}" {{ $tahunSelesaiSelected == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tingkat Pendidikan (Bulan)</label>
                                    <select name="jenjang_sekolah[]" class="form-control">
                                        <option value="">Pilih Tingkat Pendidikan</option>
                                        @foreach (['Diploma', 'Sarjana'] as $jenjang)
                                            <option value="{{ $jenjang }}"
                                                {{ $dataEducation['jenjang_sekolah'] ?? '' == $jenjang ? 'selected' : '' }}>
                                                {{ $jenjang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_education">Deskripsi</label>
                                    <textarea name="deskripsi_education[]" rows="6" class="form-control">{{ old('deskripsi_education', $dataEducation->deskripsi_education ?? '') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ipk">IPK (Opsional namun direkomendasikan)</label>
                                    <input type="number" name="ipk[]" class="form-control"
                                        value="{{ old('ipk', $dataEducation->ipk ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="ipk_max">IPK Maksimal</label>
                                    <input type="number" name="ipk_max[]" class="form-control"
                                        value="{{ old('ipk_max', $dataEducation->ipk_max ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="pencapaian">Aktifitas dan Pencapaian</label>
                                    <textarea name="pencapaian[]" id="konten2" class="form-control" cols="30" rows="10" hidden>{!! old('pencapaian', $dataEducation->pencapaian ?? '') !!}</textarea>
                                    <div id="editor-konten-2" style="min-height: 250px;" class="bg-white">
                                        {!! old('pencapaian', $dataEducation->pencapaian ?? '') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="link_sertifikat">Link Sertifikat</label>
                                    <input type="text" name="link_sertifikat[]" class="form-control"
                                        value="{{ old('link_sertifikat', $dataEducation->link_sertifikat ?? '') }}"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-info btn-block mb-3" onclick="addEducation()"><i
                        class="fe fe-plus"></i>Tambah
                    Riwayat Pendididikan</button>
                <div class="form-group float-right">
                    <button type="button" class="btn btn-outline-primary" onclick="prevStep()">Kembali</button>
                    <button type="button" id="submitButtonPendidikan" class="btn btn-primary">Simpan &
                        Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
