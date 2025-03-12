@foreach ($bimbingan as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Laporan Bimbingan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('laporan-bimbingan.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="mahasiswa_id" class="required">Mahasiswa</label>
                            <select class="form-control select2" id="mahasiswa_id" name="mahasiswa_id" required>
                                @foreach ($mahasiswas as $data)
                                    @if (old('mahasiswa_id', $data->id) == $item->id)
                                        <option value="{{ $data->id }}" selected hidden>{{ $data->name }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosen_pembimbing_id" class="required">Dosen Pembimbing</label>
                            <select class="form-control select2" id="dosen_pembimbing_id" name="dosen_pembimbing_id"
                                required>
                                @foreach ($dospem as $data)
                                    @if (old('dosen_pembimbing_id', $data->id) == $item->id)
                                        <option value="{{ $data->id }}" selected hidden>
                                            {{ $data->dosen->nama_dosen }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->dosen->nama_dosen }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_bimbingan" class="required">Tanggal Bimbingan</label>
                            <input type="date" class="form-control" id="tanggal_bimbingan" name="tanggal_bimbingan"
                                value="{{ $item->tanggal_bimbingan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="topik_bahasan" class="required">Topik Bahasan</label>
                            <input type="text" class="form-control" id="topik_bahasan" name="topik_bahasan"
                                value="{{ $item->topik_bahasan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="hasil_bimbingan" class="required">Hasil Bimbingan</label>
                            <textarea name="hasil_bimbingan" id="hasil_bimbingan" class="form-control" cols="30" rows="4" required>{{ $item->hasil_bimbingan }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="saran_pembimbing" class="required">Saran Pembimbing</label>
                            <textarea name="saran_pembimbing" id="saran_pembimbing" class="form-control" cols="30" rows="4" required>{{ $item->saran_pembimbing }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="catatan_mahasiswa" class="required">Catatan Mahasiswa</label>
                            <textarea name="catatan_mahasiswa" id="catatan_mahasiswa" class="form-control" cols="30" rows="4" required>{{ $item->catatan_mahasiswa }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_laporan" class="required">File Laporan</label>
                            <p class="small text-muted">Format file (.pdf , .doc , .docx) ukuran maksimal 4MB</p>
                            <input type="file" class="form-control-file" id="file_laporan" name="file_laporan"
                                value="{{ $item->file_laporan }}">
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
