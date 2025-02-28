<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Kabupaten</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kabupaten.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="provinsi_id" class="required">Provinsi</label>
                        <select class="form-control" id="provinsi_id" name="provinsi_id" required>
                            <option value="">Pilih Provinsi</option>
                            @foreach($provinsi as $prov)
                                <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Nama Kabupaten</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="code" class="required">Kode</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="full_code" class="required">Kode Lengkap</label>
                        <input type="text" class="form-control" id="full_code" name="full_code" required>
                    </div>
                    <div class="form-group">
                        <label for="type" class="required">Tipe</label>
                        <input type="text" class="form-control" id="type" name="type" required>
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
