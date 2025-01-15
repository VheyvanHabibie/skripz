<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Dosen Pembimbing</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dosen-pembimbing.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dosen_id" class="required">Dosen</label>
                        <select class="form-control select2" id="dosen_id" name="dosen_id" required>
                            @foreach ($dosen as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program_study" class="required">Pembimbing Jenjang Pendidikan</label>
                        <select class="custom-select" id="program_study" name="program_study" required>
                            <option value="" hidden>Pilih Jenjang Pendidikan</option>
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
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
