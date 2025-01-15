@foreach ($kontak as $item)
    <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Detail Kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td><h6 class="text-dark font-weight-bold">Nama Pengirim</h6></td>
                            <td><h6 class="text-dark font-weight-bold">:</h6></td>
                            <td><h6 class="text-dark font-weight-bold">{{ $item->nama_pengirim }}</h6></td>
                        </tr>
                        <tr>
                            <td><h6 class="text-dark font-weight-bold">Email Pengirim</h6></td>
                            <td><h6 class="text-dark font-weight-bold">:</h6></td>
                            <td><h6 class="text-dark font-weight-bold">{{ $item->email_pengirim }}</h6></td>
                        </tr>
                    </table>
                    <h6 class="text-dark font-weight-bold">Pesan :</h6>
                    <p class="text-dark">
                        {{ $item->pesan_pengirim }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
@endforeach
