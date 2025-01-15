@foreach ($tulisan as $item)
    <div class="modal fade" id="editModalTulisan{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="varyModalLabel">Edit Data Tulisan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tulisan.edit', $item->id) }}" method="POST">
                        @csrf
                        @method('Patch')
                        <div class="form-group">
                            <label for="tulisan" class="required">Tulisan</label>
                            <textarea class="form-control" name="tulisan" id="tulisan" rows="4" required>{{ $item->tulisan }}</textarea>
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
