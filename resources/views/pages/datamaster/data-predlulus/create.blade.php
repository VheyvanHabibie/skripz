<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Predikat Kelulusan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('predikat-kelulusan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mahasiswa" class="required">Mahasiswa</label>
                        <select class="custom-select" id="mahasiswa" name="mahasiswa" required>
                            <option value="" hidden>Pilih Mahasiswa</option>
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="memuaskan" class="required">Memuaskan</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="memuaskan"
                            name="memuaskan" required>
                    </div>
                    <div class="form-group">
                        <label for="sangat_memuaskan" class="required">Sangat Memuaskan</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="sangat_memuaskan"
                            name="sangat_memuaskan" required>
                    </div>
                    <div class="form-group">
                        <label for="cumlaude" class="required">Cumlaude</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="cumlaude"
                            name="cumlaude" required>
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
