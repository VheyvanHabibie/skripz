@foreach ($provinsi as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Provinsi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('provinsi.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="required">Nama Provinsi</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="code" class="required">Kode</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $item->code }}" required>
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
@endforeach
