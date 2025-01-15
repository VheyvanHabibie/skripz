<div class="modal fade" id="createModalPerbaikan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perbaikan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="bab">BAB</label>
                        <input type="text" class="form-control" name="bab" required>
                    </div>
                    <div class="form-group">
                        <label for="perbaikan">Hal Yang Harus Diperbaiki</label>
                        <textarea class="form-control" name="perbaikan" id="perbaikan" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status" class="required">Status</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="status1" name="selesai" class="custom-control-input"
                                value="1">
                            <label class="custom-control-label" for="status1">Selesai</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="status2" name="selesai" class="custom-control-input"
                                value="0">
                            <label class="custom-control-label" for="status2">Belum Selesai</label>
                        </div>
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
