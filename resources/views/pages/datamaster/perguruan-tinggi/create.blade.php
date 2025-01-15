<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Perguruan Tinggi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('perguruan-tinggi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_perguruan_tinggi" class="required">Nama Perguruan Tinggi</label>
                        <input type="text" class="form-control" id="nama_perguruan_tinggi" name="nama_perguruan_tinggi" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="provinsi_id">Provinsi</label>
                            <select id="provinsi" name="provinsi_id" class="form-control">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach ($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kabupaten_id">Kabupaten / Kota</label>
                            <select id="kabupaten" name="kabupaten_id" disabled class="form-control">
                                <option value="">-- Pilih Kabupaten --</option>
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label for="kecamatan_id">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan_id" disabled class="form-control">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kelurahan_id">Kelurahan</label>
                            <select id="kelurahan" name="kelurahan_id" disabled class="form-control">
                                <option value="">-- Pilih Kelurahan --</option>
                            </select>
                        </div> --}}
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
