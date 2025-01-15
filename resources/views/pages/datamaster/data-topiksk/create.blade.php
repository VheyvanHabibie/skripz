<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Topik Skripsi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('topik-skripsi.store') }}" method="POST">
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
                        <label for="judul_topik" class="required">Judul Topik</label>
                        <input type="text" class="form-control" id="judul_topik" name="judul_topik" required>
                    </div>
                    <div class="form-group">
                        <label for="kata_kunci" class="required">Kata Kunci</label>
                        <input type="text" class="form-control" id="kata_kunci" name="kata_kunci"
                            placeholder="Dipisahkan dengan tanda koma" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="required">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link" class="required">Link Referensi (3 Referensi)</label>
                        <textarea class="form-control" id="link" name="link" placeholder="Tambahkan pemisah koma setiap link"
                            rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sumber_id" class="required">Sumber Referensi</label>
                        <select class="form-control select2" id="sumber_id" name="sumber_id" required>
                            @foreach ($sumber as $data)
                                <option value="{{ $data->id }}">{{ $data->sumber_referensi }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="status_topik" class="required">Status Topik</label>
                        <select name="status_topik" id="status_topik" class="form-control">
                            <option value="" hidden>Pilih Status</option>
                            <option value="Diajukan">Diajukan</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn mb-2 btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
