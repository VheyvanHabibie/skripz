@foreach ($yudisium as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Laporan Sidang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('laporan-yudisium.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal_sidang" class="required">Tanggal Sidang</label>
                            <input type="date" class="form-control" id="tanggal_sidang" name="tanggal_sidang" value="{{ $item->tanggal_sidang }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="mahasiswa_id" class="required">Mahasiswa</label>
                            <select class="form-control select2" id="mahasiswa_id" name="mahasiswa_id" required>
                                @foreach ($mahasiswa as $data)
                                    @if (old('mahasiswa_id', $data->id) == $item->id)
                                        <option value="{{ $data->id }}" selected hidden>
                                            {{ $data->name }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ipk" class="required">IPK</label>
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{ $item->ipk }}" required>
                        </div>
                        <div class="form-group">
                            <label for="peringkat" class="required">Peringkat IPK</label>
                            <input type="text" class="form-control" id="peringkat" name="peringkat" value="{{ $item->peringkat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="peringkat_kelulusan" class="required">Predikat Kelulusan</label>
                            <input type="text" class="form-control" id="peringkat_kelulusan" name="peringkat_kelulusan" value="{{ $item->peringkat_kelulusan }}"
                                required>
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
