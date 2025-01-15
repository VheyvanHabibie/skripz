    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Tambah Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('mitrapengguna.store') }}" method="POST" class="needs-validation" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_mitra" class="col-form-label">Nama Mitra</label>
                            <input type="text" class="form-control" name="nama_mitra" value="{{ old('nama_mitra') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-form-label">Logo Mitra</label>
                            <p class="small text-danger">Maksimal Gambar: 2MB & Ukuran Gambar Harus 40x40 </p>
                            <input type="file" class="form-control-file form-custom" name="logo" accept="image/*"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn mb-2 btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
