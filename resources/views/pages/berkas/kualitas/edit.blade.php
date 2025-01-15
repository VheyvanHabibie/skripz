@foreach ($kualitas as $item)
    <div class="modal fade" id="editModalKualitas{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="varyModalLabel">Edit Data Kualitas</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kualitas.edit', $item->id) }}" method="POST">
                        @csrf
                        @method('Patch')
                        <div class="form-group">
                            <label for="kualitas" class="required">Kualitas Produk</label>
                            <textarea class="form-control" name="kualitas" id="kualitas" rows="4" required>{{ $item->kualitas }}</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn mb-2 btn-primary">Send</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
