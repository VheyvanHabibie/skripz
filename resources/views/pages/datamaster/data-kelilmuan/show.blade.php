@foreach ($kelilmuan as $item)
    <div class="modal fade showModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="defaultModalLabel">Detail Data Kelompok Keilmuan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kelompok_keilmuan">Kelompok Keilmuan</label>
                        <input type="text" name="kelompok_keilmuan" id="kelompok_keilmuan"
                            value="{{ $item->keilmuan->nama_keilmuan }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="bidang_kajian">Bidang Kajian</label>
                        <input type="text" name="bidang_kajian" id="bidang_kajian" value="{{ $item->bidang_kajian }}"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="koordinator">Koordinator</label>
                        <input type="text" name="koordinator" id="koordinator" value="{{ $item->koordinator }}"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Jenis Kelamin</label>
                        <input type="text" name="fakultas" id="fakultas" value="{{ $item->fakultas }}"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Dekripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control" disabled>{{ $item->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="links">Link Repository</label>
                        <textarea name="links" id="links" cols="30" rows="3" class="form-control" disabled>{{ $item->links }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
