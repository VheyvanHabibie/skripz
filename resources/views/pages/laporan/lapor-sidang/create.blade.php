<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Upload Laporan Kemajuan Sidang</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-kemajuan-sidang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_sidang" class="required">Tanggal Sidang</label>
                        <input type="date" class="form-control" id="tanggal_sidang" name="tanggal_sidang" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_sidang" class="required">Waktu Sidang</label>
                        <input type="time" class="form-control" id="waktu_sidang" name="waktu_sidang" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_skripsi" class="required">Judul Skripsi</label>
                        <input type="text" class="form-control" id="judul_skripsi" name="judul_skripsi" required>
                    </div>
                    <div class="form-group">
                        <label for="dosen_penguji1" class="required">Dosen Penguji 1</label>
                        <select class="form-control select2" id="dosen_penguji1" name="dosen_penguji1" required>
                            @foreach ($dospeng as $data)
                                <option value="{{ $data->dosen->nama_dosen }}">{{ $data->dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dosen_penguji2" class="required">Dosen Penguji 2</label>
                        <select class="form-control select2" id="dosen_penguji2" name="dosen_penguji2" required>
                            @foreach ($dospeng as $data)
                                <option value="{{ $data->dosen->nama_dosen }}">{{ $data->dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai_skripsi" class="required">Nilai Skripsi</label>
                        <input type="text" class="form-control" id="nilai_skripsi" name="nilai_skripsi" required>
                    </div>
                    <div class="form-group">
                        <label for="saran_penguji" class="required">Saran Penguji</label>
                        <input type="text" class="form-control" id="saran_penguji" name="saran_penguji" required>
                    </div>
                    <div class="form-group">
                        <label for="file_laporan" class="required">File Laporan</label>
                        <p class="small text-muted">Format file (.pdf , .doc , .docx) ukuran maksimal 4MB</p>
                        <input type="file" class="form-control-file" id="file_laporan" name="file_laporan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn mb-2 btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
