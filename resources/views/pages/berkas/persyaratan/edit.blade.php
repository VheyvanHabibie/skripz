@foreach ($persyaratan as $item)
    <div class="modal fade" id="editModalPersyaratan{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('persyaratan.edit', $item->id) }}" method="POST">
                        @csrf
                        @method('Patch')
                        <div class="form-group">
                            <label for="persyaratan">Persyaratan</label>
                            <textarea class="form-control" name="persyaratan" id="persyaratan" rows="4" required>{{ $item->persyaratan }}</textarea>
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
