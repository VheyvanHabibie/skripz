@foreach ($perguruan_tinggi as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Perguruan Tinggi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('perguruan-tinggi.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_perguruan_tinggi_{{ $item->id }}" class="required">Nama Perguruan
                                Tinggi</label>
                            <input type="text" class="form-control" id="nama_perguruan_tinggi_{{ $item->id }}"
                                name="nama_perguruan_tinggi" value="{{ $item->nama_perguruan_tinggi }}" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="provinsi_{{ $item->id }}">Provinsi</label>
                                <select id="provinsi_{{ $item->id }}" name="provinsi_id" class="form-control">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}"
                                            {{ $item->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                                            {{ $provinsi->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kabupaten_{{ $item->id }}">Kabupaten / Kota</label>
                                <select id="kabupaten_{{ $item->id }}" name="kabupaten_id" class="form-control">
                                </select>
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label for="kecamatan_{{ $item->id }}">Kecamatan</label>
                                <select id="kecamatan_{{ $item->id }}" name="kecamatan_id" class="form-control">
                                    <option value="">-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}"
                                            {{ $item->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                                            {{ $kecamatan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kelurahan_{{ $item->id }}">Kelurahan</label>
                                <select id="kelurahan_{{ $item->id }}" name="kelurahan_id" class="form-control">
                                    <option value="">-- Pilih Kelurahan --</option>
                                    @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}"
                                            {{ $item->kelurahan_id == $kelurahan->id ? 'selected' : '' }}>
                                            {{ $kelurahan->name }}
                                        </option>
                                    @endforeach
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
@endforeach
