<div class="modal fade" id="createModalPersyaratan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel"
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
                <form action="{{ route('persyaratan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="persyaratan">Persyaratan</label>
                        <textarea class="form-control" name="persyaratan" id="persyaratan" rows="4" required></textarea>
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
