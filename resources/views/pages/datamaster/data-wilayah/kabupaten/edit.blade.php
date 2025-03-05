@foreach ($kabupatens as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Kabupaten</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kabupaten.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="provinsi_id{{ $item->id }}" class="required">Provinsi</label>
                            <select class="form-control" id="provinsi_id{{ $item->id }}" name="provinsi_id"
                                required>
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinsi as $prov)
                                    <option value="{{ $prov->id }}"
                                        {{ $item->provinsi_id == $prov->id ? 'selected' : '' }}>
                                        {{ $prov->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name{{ $item->id }}" class="required">Nama Kabupaten</label>
                            <input type="text" class="form-control" id="name{{ $item->id }}" name="name"
                                value="{{ $item->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="code{{ $item->id }}" class="required">Kode</label>
                            <input type="text" class="form-control" id="code{{ $item->id }}" name="code"
                                value="{{ $item->code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="full_code{{ $item->id }}" class="required">Kode Lengkap</label>
                            <input type="text" class="form-control" id="full_code{{ $item->id }}"
                                name="full_code" value="{{ $item->full_code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type{{ $item->id }}" class="required">Tipe</label>
                            <input type="text" class="form-control" id="type{{ $item->id }}" name="type"
                                value="{{ $item->type }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn mb-2 btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
