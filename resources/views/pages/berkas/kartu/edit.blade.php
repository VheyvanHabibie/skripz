<div class="modal fade" id="editModalAsistensi" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kartu.update', get_app_info('id')) }}" method="POST">
                    @csrf
                    @method('Patch')
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim"
                            value="{{ $kartu ? $kartu->nim : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama"
                            value="{{ $kartu ? $kartu->nama : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_skripsi">Judul Skripsi</label>
                        <textarea class="form-control" name="judul_skripsi" id="judul_skripsi" rows="4" required>{{ $kartu ? $kartu->judul_skripsi : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="perubahan_judul_skripsi">Perubahan Judul Skripsi</label>
                        <textarea class="form-control" name="perubahan_judul_skripsi" id="perubahan_judul_skripsi" rows="4" required>{{ $kartu ? $kartu->perubahan_judul_skripsi : '' }}</textarea>
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
