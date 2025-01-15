    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Tambah Klien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('klien.store') }}" method="POST" class="needs-validation" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_klien" class="col-form-label">Nama Klien</label>
                            <input type="text" class="form-control" name="nama_klien" value="{{ old('nama_klien') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-form-label">Logo Klien</label>
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
