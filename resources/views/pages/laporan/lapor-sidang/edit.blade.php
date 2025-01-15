@foreach ($sidang as $item)
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
                <form action="{{ route('laporan-kemajuan-sidang.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal_sidang" class="required">Tanggal Sidang</label>
                            <input type="date" class="form-control" id="tanggal_sidang" name="tanggal_sidang"
                                value="{{ $item->tanggal_sidang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_sidang" class="required">Waktu Sidang</label>
                            <input type="time" class="form-control" id="waktu_sidang" name="waktu_sidang" value="{{ $item->waktu_sidang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="judul_skripsi" class="required">Judul Skripsi</label>
                            <input type="text" class="form-control" id="judul_skripsi" name="judul_skripsi" value="{{ $item->judul_skripsi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="dosen_penguji1" class="required">Dosen Penguji 1</label>
                            <select class="form-control select2" id="dosen_penguji1" name="dosen_penguji1" required>
                                @foreach ($dospeng as $data)
                                    @if (old('dosen_penguji1', $data->id) == $item->id)
                                        <option value="{{ $data->dosen->nama_dosen }}" selected hidden>
                                            {{ $data->dosen->nama_dosen }}
                                        </option>
                                    @else
                                        <option value="{{ $data->dosen->nama_dosen }}">{{ $data->dosen->nama_dosen }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosen_penguji2" class="required">Dosen Penguji 2</label>
                            <select class="form-control select2" id="dosen_penguji2" name="dosen_penguji2" required>
                                @foreach ($dospeng as $data)
                                    @if (old('dosen_penguji2', $data->id) == $item->id)
                                        <option value="{{$data->dosen->nama_dosen }}" selected hidden>
                                            {{ $data->dosen->nama_dosen }}
                                        </option>
                                    @else
                                        <option value="{{$data->dosen->nama_dosen }}">{{ $data->dosen->nama_dosen }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nilai_skripsi" class="required">Nilai Skripsi</label>
                            <input type="text" class="form-control" id="nilai_skripsi" name="nilai_skripsi" value="{{ $item->nilai_skripsi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="saran_penguji" class="required">Saran Penguji</label>
                            <input type="text" class="form-control" id="saran_penguji" name="saran_penguji" value="{{ $item->saran_penguji }}" required>
                        </div>
                        <div class="form-group">
                            <label for="file_laporan" class="required">File Laporan</label>
                            <p class="small text-muted">Format file (.pdf , .doc , .docx) ukuran maksimal 4MB</p>
                            <input type="file" class="form-control-file" id="file_laporan" name="file_laporan" value="{{ $item->file_laporan }}">
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
