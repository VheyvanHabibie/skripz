@foreach ($presentasi as $item)
    <div class="modal fade" id="editModalPresentasi{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="varyModalLabel">Edit Data Presentasi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('presentasi.edit', $item->id) }}" method="POST">
                        @csrf
                        @method('Patch')
                        <div class="form-group">
                            <label for="presentasi" class="required">Presentasi</label>
                            <textarea class="form-control" name="presentasi" id="presentasi" rows="4" required>{{ $item->presentasi }}</textarea>
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
