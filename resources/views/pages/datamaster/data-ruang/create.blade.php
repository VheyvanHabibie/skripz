<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Ruang</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ruang.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_ruang" class="required">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas" class="required">Kapasitas</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" id="kapasitas" name="kapasitas"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Orang</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_ruang" class="required">Jenis Ruangan</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="lab" name="jenis_ruang" class="custom-control-input"
                                value="Laboratorium" required>
                            <label class="custom-control-label" for="lab">Laboratorium</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="kelas" name="jenis_ruang"
                                class="custom-control-input"value="Kelas" required>
                            <label class="custom-control-label" for="kelas">Kelas </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lantai" class="required">Lantai</label>
                        <input type="number" min="0" class="form-control" id="lantai" name="lantai"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="gedung" class="required">Gedung</label>
                        <input type="text" class="form-control" id="gedung" name="gedung" required>
                    </div>
                    <div class="form-group">
                        <label for="fasilitas" class="required">Fasilitas</label>
                        <textarea class="form-control" id="fasilitas" name="fasilitas" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ketersediaan" class="required">Status Ketersediaan</label>
                        <select class="custom-select" id="ketersediaan" name="ketersediaan" required>
                            <option value="" hidden>Pilih Status</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Digunakan">Digunakan</option>
                            <option value="Renovasi">Renovasi</option>
                        </select>
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
