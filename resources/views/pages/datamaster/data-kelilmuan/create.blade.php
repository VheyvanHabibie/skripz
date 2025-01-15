<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Kelompok Keilmuan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kelompok-keilmuan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keilmuan_id" class="required">Keilmuan</label>
                        <select class="form-control select2" id="keilmuan_id" name="keilmuan_id"
                            required>
                            @foreach ($keilmuan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_keilmuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bidang_kajian" class="required">Bidang Kajian</label>
                        <input type="text" class="form-control" id="bidang_kajian" name="bidang_kajian" required>
                    </div>
                    <div class="form-group">
                        <label for="koordinator" class="required">Koordinator</label>
                        <input type="text" class="form-control" id="koordinator" name="koordinator" required>
                    </div>
                    <div class="form-group">
                        <label for="fakultas" class="required">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="required">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="links" class="required">Link Repository</label>
                        <textarea class="form-control" id="links" name="links" required></textarea>
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
