<div class="step" id="step1">
    <div class="card">
        <div class="card-body">
            <h3>Data Pribadi</h3>
            <form id="formDataPribadi" enctype="multipart/form-data">
                <input type="hidden" id="data_pribadi_id" name="data_pribadi_id" value="{{ $dataPersonal->id ?? '' }}">
                <div class="form-group">
                    <label for="nama_lengkap">Nama</label>
                    <input type="text" name="nama_lengkap" class="form-control"
                        value="{{ old('nama_lengkap', $dataPersonal->nama_lengkap ?? '') }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="no_telpon">Nomor Telepon</label>
                        <input type="text" name="no_telpon" class="form-control"
                            value="{{ old('no_telpon', $dataPersonal->no_telpon ?? '') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $dataPersonal->email ?? '') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="url_linkedin">Linkedin Profile URL</label>
                    <input type="text" name="url_linkedin" class="form-control"
                        value="{{ old('url_linkedin', $dataPersonal->url_linkedin ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="url_portofolio">Portfolio/Website URL (Optional)</label>
                    <input type="text" name="url_portofolio" class="form-control"
                        value="{{ old('url_portofolio', $dataPersonal->url_portofolio ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat (opsional)</label>
                    <textarea name="alamat" rows="4" class="form-control">{{ old('alamat', $dataPersonal->alamat ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="deskripsi_singkat">Deskripsi singkat tentang kamu</label>
                    <textarea name="deskripsi_singkat" rows="8" class="form-control">{{ old('deskripsi_singkat', $dataPersonal->deskripsi_singkat ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="foto">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-file">
                    @if ($dataPersonal->foto ?? '')
                        <img src="{{ asset($dataPersonal->foto) }}" width="80" class="mt-3">
                    @endif
                </div>

                <div class="form-group float-right">
                    <button type="button" class="btn btn-outline-primary" type="reset">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="saveData()">Simpan &
                        Lanjutkan</button>
                </div>
            </form>

        </div>
    </div>
</div>
