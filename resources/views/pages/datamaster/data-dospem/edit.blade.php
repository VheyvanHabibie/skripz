@foreach ($dospem as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Dosen Pembimbing</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dosen-pembimbing.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dosen_id" class="required">Pilih Dosen</label>
                            <select class="form-control select2" id="dosen_id" name="dosen_id" required>
                                @foreach ($dosen as $data)
                                    @if (old('dosen_id', $data->id) == $item->dosen->id)
                                        <option value="{{ $data->id }}" selected hidden>{{ $data->nama_dosen }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->nama_dosen }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="program_study" class="required">Penguji Jenjang Pendidikan</label>
                            <select class="custom-select" id="program_study" name="program_study" required>
                                <option value="" hidden>Pilih Jenjang Pendidikan</option>
                                <option value="S1" @if ($item->program_study == 'S1') selected @endif>S1</option>
                                <option value="D3" @if ($item->program_study == 'D3') selected @endif>D3</option>
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
