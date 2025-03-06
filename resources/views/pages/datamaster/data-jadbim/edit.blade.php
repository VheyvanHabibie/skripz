@foreach ($jadbim as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="editModalLabel">Edit Data Bimbingan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('bimbingan.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mahbim_id" class="required">Mahasiswa Bimbingan</label>
                        <select class="form-control select2" id="mahbim_id" name="mahbim_id" required>
                            @foreach ($mahbim as $data)
                                <option value="{{ $data->id }}" {{ $item->mahbim_id == $data->id ? 'selected' : '' }}>
                                    {{ $data->mahasiswa->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dosen_id" class="required">Dosen Pembimbing</label>
                        <select class="form-control select2" id="dosen_id" name="dosen_id" required>
                            @foreach ($dospem as $data)
                                <option value="{{ $data->id }}" {{ $item->dosen_id == $data->id ? 'selected' : '' }}>
                                    {{ $data->dosen->nama_dosen }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi" class="required">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $item->prodi }}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $item->tanggal_mulai }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $item->jam_mulai }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $item->tanggal_selesai }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $item->jam_selesai }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruang_id" class="required">Pilih Ruang</label>
                        <select class="form-control select2" id="ruang_id" name="ruang_id" required>
                            @foreach ($ruang as $data)
                                <option value="{{ $data->id }}" {{ $item->ruang_id == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama_ruang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_bimbingan" class="required">Status Bimbingan</label>
                        <select class="custom-select" id="status_bimbingan" name="status_bimbingan" required>
                            <option value="" hidden>Pilih Status</option>
                            <option value="Proposal" {{ $item->status_bimbingan == 'Proposal' ? 'selected' : '' }}>Proposal</option>
                            <option value="Seminar" {{ $item->status_bimbingan == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="Sidang" {{ $item->status_bimbingan == 'Sidang' ? 'selected' : '' }}>Sidang</option>
                        </select>
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
