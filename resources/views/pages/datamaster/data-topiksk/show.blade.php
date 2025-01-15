@foreach ($topiksk as $item)
    <div class="modal fade showModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="defaultModalLabel">Detail Data Topik Skripsi</h6>
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
                        <label for="judul_topik">Judul Topik</label>
                        <input type="text" name="judul_topik" id="judul_topik" value="{{ $item->judul_topik }}"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kata_kunci">Kata Kunci</label>
                        <input type="text" name="kata_kunci" id="kata_kunci" value="{{ $item->kata_kunci }}"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Dekripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control" disabled>{{ $item->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="link" class="required">Link Referensi (3 Referensi)</label>
                        @foreach (json_decode($item->link) as $link)
                            <li><a href="{{ $link }}" target="_blank">{{ $link }}</a>
                            </li>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="sumber_id">Sumber</label>
                        <input type="text" name="sumber_id" id="sumber_id" class="form-control"
                            value="{{ $item->sumber->sumber_referensi }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status_topik">Status Topik</label>
                        <input type="text" name="status_topik" id="status_topik" class="form-control"
                            value="{{ $item->status_topik }}" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
