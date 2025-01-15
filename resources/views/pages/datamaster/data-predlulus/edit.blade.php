@foreach ($predlulus as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Predikat Kelulusan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('predikat-kelulusan.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="mahasiswa" class="required">Mahasiswa</label>
                            <select class="custom-select" id="mahasiswa" name="mahasiswa" required>
                                <option value="" hidden>Pilih Mahasiswa</option>
                                <option value="S1" @if($item->mahasiswa == 'S1') selected @endif>S1</option>
                                <option value="D3" @if($item->mahasiswa == 'D3') selected @endif>D3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="memuaskan" class="required">Memuaskan</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="memuaskan" value="{{ $item->memuaskan }}"
                                name="memuaskan" required>
                        </div>
                        <div class="form-group">
                            <label for="sangat_memuaskan" class="required">Sangat Memuaskan</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="sangat_memuaskan"
                                name="sangat_memuaskan" value="{{ $item->sangat_memuaskan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cumlaude" class="required">Cumlaude</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="cumlaude"
                                name="cumlaude" value="{{ $item->cumlaude }}" required>
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
