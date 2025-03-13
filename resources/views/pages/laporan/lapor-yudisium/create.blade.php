<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Upload Laporan Yudisium</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-yudisium.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_sidang" class="required">Tanggal Sidang</label>
                        <input type="date" class="form-control" id="tanggal_sidang" name="tanggal_sidang" required>
                    </div>
                    <div class="form-group">
                        <label for="mahasiswa_id" class="required">Mahasiswa</label>
                        <select class="form-control select2" id="mahasiswa_id" name="mahasiswa_id" required>
                            @foreach ($mahasiswa as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ipk" class="required">IPK</label>
                        <input type="number" class="form-control" id="ipk" name="ipk" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="peringkat" class="required">Peringkat IPK</label>
                        <input type="number" class="form-control" id="peringkat" min="1" name="peringkat" required>
                    </div>
                    <div class="form-group">
                        <label for="peringkat_kelulusan" class="required">Predikat Kelulusan</label>
                        <input type="text" class="form-control" id="peringkat_kelulusan" name="peringkat_kelulusan" required>
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
