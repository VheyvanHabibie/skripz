<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Upload Laporan Kemajuan Seminar</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-kemajuan-seminar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_seminar" class="required">Tanggal Seminar</label>
                        <input type="date" class="form-control" id="tanggal_seminar" name="tanggal_seminar" required>
                    </div>
                    <div class="form-group">
                        <label for="hasil_seminar" class="required">Hasil Seminar</label>
                        <input type="text" class="form-control" id="hasil_seminar" name="hasil_seminar" required>
                    </div>
                    <div class="form-group">
                        <label for="saran_penguji" class="required">Saran Penguji</label>
                        <input type="text" class="form-control" id="saran_penguji" name="saran_penguji" required>
                    </div>
                    <div class="form-group">
                        <label for="catatan_mahasiswa" class="required">Catatan Mahasiswa</label>
                        <textarea name="catatan_mahasiswa" id="catatan_mahasiswa" class="form-control" cols="30" rows="4" required></textarea>
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
