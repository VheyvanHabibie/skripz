@foreach ($pelamar as $item)
    <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Detail Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nama Pelamar</dt>
                        <dd class="col-sm-9">{{ $item->nama_pelamar }}</dd>
                        <dt class="col-sm-3">Email Pelamar</dt>
                        <dd class="col-sm-9">{{ $item->email_pelamar }}</dd>
                        <dt class="col-sm-3">Alamat Pelamar</dt>
                        <dd class="col-sm-9">{{ $item->alamat_pelamar }}</dd>
                        <dt class="col-sm-3">Posisi Yang Dilamar</dt>
                        <dd class="col-sm-9">{{ $item->lowongan->posisi_pekerjaan }}</dd>
                        <dt class="col-sm-3">File CV</dt>
                        <dd class="col-sm-9">
                            <a href="{{ asset($item->file_cv) }}" download>Unduh File</a>
                        </dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
@endforeach
