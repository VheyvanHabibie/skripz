@foreach ($mahbim as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Mahasiswa Bimbingan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('mahasiswa-bimbingan.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="mahasiswa_id" class="required">Pilih Mahasiswa</label>
                            <select class="form-control select2" id="mahasiswa_id" name="mahasiswa_id" required>
                                @foreach ($mahasiswa as $data)
                                    @if (old('mahasiswa_id', $data->id) == $item->mahasiswa->id)
                                        <option value="{{ $data->id }}" selected hidden>
                                            {{ $data->name }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach
                            </select>
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
