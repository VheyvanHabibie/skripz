@foreach ($thakademik as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Tahun Akademik</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tahun-akademik.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tahun_akademik" class="required">Tahun Akademik</label>
                            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik"
                                value="{{ $item->tahun_akademik }}" required>
                        </div>
                        <div class="form-group">
                            <label for="semester" class="required">Semester</label>
                            <select class="custom-select" id="semester" name="semester" required>
                                <option value="" hidden>Pilih Semester</option>
                                <option value="Ganjil" @if ($item->semester == 'Ganjil') selected @endif>Ganjil</option>
                                <option value="Genap" @if ($item->semester == 'Genap') selected @endif>Genap</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_mulai" class="required">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                        value="{{ $item->tanggal_mulai }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_selesai" class="required">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_selesai"
                                        name="tanggal_selesai" value="{{ $item->tanggal_selesai }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status_akademik" class="required">Status Akademik</label>
                            <select class="custom-select" id="status_akademik" name="status_akademik" required>
                                <option value="" hidden>Pilih Status</option>
                                <option value="Aktif" @if ($item->status_akademik == 'Aktif') selected @endif>Aktif</option>
                                <option value="Tidak Aktif" @if ($item->status_akademik == 'Tidak Aktif') selected @endif>Tidak
                                    Aktif</option>
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
