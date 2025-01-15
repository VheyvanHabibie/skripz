<div class="step" id="step4">
    <div class="card">
        <div class="card-body">
            <form id="formDataOrganisasi" method="POST">
                @csrf
                <h3 class="mb-3">Pengalaman Organisasi</h3>
                <div class="accordion w-100" id="accordion-org">
                    <div class="card shadow mb-3">
                        <a role="button" href="#collapse-org" data-toggle="collapse" data-target="#collapse-org"
                            aria-expanded="true" aria-controls="collapse-org" class="text-dark text-decoration-none">
                            <div class="card-header" id="heading1">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint,
                                        atque?</strong>
                                    <i class="fe fe-plus fe-16"></i>
                                </div>
                            </div>
                        </a>
                        <div id="collapse-org" class="collapse show" aria-labelledby="heading1"
                            data-parent="#accordion-org" style="">
                            <div class="card-body">
                                <input type="hidden" id="data_org_id" name="data_org_id"
                                    value="{{ $dataOrganization->id ?? '' }}">
                                <input type="hidden" name="personal_id" id="personal_id_2">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_organisasi">Organisasi/Nama Acara</label>
                                        <input type="text" name="nama_organisasi[]" class="form-control"
                                            value="{{ old('nama_organisasi', $dataOrganization->nama_organisasi ?? '') }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="posisi">Posisi/Gelar Jabatan</label>
                                        <input type="text" name="posisi[]" class="form-control"
                                            value="{{ old('posisi', $dataOrganization->posisi ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_organisasi">Deskripsi Organisasi (opsional)</label>
                                    <textarea name="deskripsi_organisasi[]" rows="6" class="form-control">{{ old('deskripsi_organisasi', $dataOrganization->deskripsi_organisasi ?? '') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_organisasi">Aktivitas/Acara/Lokasi Organisasi
                                        (Kota/Negara)</label>
                                    <input type="text" name="lokasi_organisasi[]" class="form-control"
                                        value="{{ old('lokasi_organisasi', $dataOrganization->lokasi_organisasi ?? '') }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bulan_mulai_organisasi">Tanggal Mulai (Bulan)</label>
                                        <select name="bulan_mulai_organisasi[]" id="bulan_mulai_organisasi"
                                            class="form-control" required>
                                            <option value="">Pilih Bulan</option>
                                            @php
                                                $bulanMulaiOrganisasi = old(
                                                    'bulan_mulai_organisasi',
                                                    $dataOrganization['bulan_mulai_organisasi'] ?? '',
                                                );
                                            @endphp
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                <option value="{{ $bulan }}"
                                                    {{ $bulanMulaiOrganisasi == $bulan ? 'selected' : '' }}>
                                                    {{ $bulan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tahun_mulai_organisasi">Tanggal Mulai (Tahun)</label>
                                        <select name="tahun_mulai_organisasi[]" id="tahun_mulai_organisasi"
                                            class="form-control" required>
                                            <option value="">Pilih Tahun</option>
                                            @php
                                                $tahunMulaiOrganisasi = old(
                                                    'tahun_mulai_organisasi',
                                                    $dataOrganization['tahun_mulai_organisasi'] ?? '',
                                                );
                                            @endphp
                                            @for ($i = date('Y'); $i >= 1950; $i--)
                                                <option value="{{ $i }}"
                                                    {{ $tahunMulaiOrganisasi == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bulan_selesai_organisasi">Tanggal Selesai (Bulan)</label>
                                        <select name="bulan_selesai_organisasi[]" id="bulan_selesai_organisasi"
                                            class="form-control">
                                            <option value="">Pilih Bulan</option>
                                            @php
                                                $bulanSelesaiOrganisasi = old(
                                                    'bulan_selesai_organisasi',
                                                    $dataOrganization['bulan_selesai_organisasi'] ?? '',
                                                );
                                            @endphp
                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                                <option value="{{ $bulan }}"
                                                    {{ $bulanSelesaiOrganisasi == $bulan ? 'selected' : '' }}>
                                                    {{ $bulan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tahun_selesai_organisasi">Tanggal Selesai (Tahun)</label>
                                        <select name="tahun_selesai_organisasi[]" id="tahun_selesai_organisasi"
                                            class="form-control">
                                            <option value="">Pilih Tahun</option>
                                            @php
                                                $tahunSelesaiOrganisasi = old(
                                                    'tahun_selesai_organisasi',
                                                    $dataOrganization['tahun_selesai_organisasi'] ?? '',
                                                );
                                            @endphp
                                            @for ($i = date('Y'); $i >= 1950; $i--)
                                                <option value="{{ $i }}"
                                                    {{ $tahunSelesaiOrganisasi == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            name="status[]" value="aktif">
                                        <label class="custom-control-label font-weight-bold" for="customCheck1">Saat ini
                                            saya aktif di sini</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                    <textarea name="deskripsi_pekerjaan[]" id="desc-org" class="form-control" cols="30" rows="10" hidden>{!! old('deskripsi_pekerjaan', $dataOrganization->deskripsi_pekerjaan ?? '') !!}</textarea>
                                    <div id="editor-desc-org" style="min-height: 250px;" class="bg-white">
                                        {!! old('deskripsi_pekerjaan', $dataOrganization->deskripsi_pekerjaan ?? '') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-info btn-block mb-3" onclick="addEducation()"><i
                        class="fe fe-plus"></i>Tambah
                    Pengalaman Organisasi</button>
                <div class="form-group float-right">
                    <button type="button" class="btn btn-outline-primary" onclick="prevStep()">Kembali</button>
                    <button type="button" id="submitButtonOrg" class="btn btn-primary">Simpan &
                        Generate</button>
                </div>
            </form>
        </div>
    </div>
</div>
