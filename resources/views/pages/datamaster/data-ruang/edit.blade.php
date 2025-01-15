@foreach ($ruang as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Tambah Data Ruang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('ruang.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_ruang" class="required">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruang" name="nama_ruang"
                                value="{{ $item->nama_ruang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas" class="required">Kapasitas</label>
                            <div class="input-group">
                                <input type="number" min="0" class="form-control" id="kapasitas"
                                    name="kapasitas" value="{{ $item->kapasitas }}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Orang</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_ruang" class="required">Jenis Ruangan</label>
                            <input type="text" class="form-control" id="jenis_ruang" name="jenis_ruang"
                                value="{{ $item->jenis_ruang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="lantai" class="required">Lantai</label>
                            <input type="number" min="0" class="form-control" id="lantai" name="lantai"
                                value="{{ $item->lantai }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gedung" class="required">Gedung</label>
                            <input type="text" class="form-control" id="gedung" name="gedung"
                                value="{{ $item->gedung }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fasilitas" class="required">Fasilitas</label>
                            @if ($item->fasilitas)
                            @php
                                $links = json_decode($item->fasilitas);
                                $linksAsString = implode(', ', $links);
                            @endphp
                            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="4" placeholder="Tambahkan pemisah koma" required>{{ $linksAsString }}</textarea>
                        @else
                            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="4" placeholder="Tambahkan pemisah koma" required></textarea>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="ketersediaan" class="required">Status Ketersediaan</label>
                            <select class="custom-select" id="ketersediaan" name="ketersediaan" required>
                                <option value="" hidden>Pilih Status</option>
                                <option value="Tersedia" @if ($item->ketersediaan == 'Tersedia') selected @endif>Tersedia
                                </option>
                                <option value="Digunakan" @if ($item->ketersediaan == 'Digunakan') selected @endif>Digunakan
                                </option>
                                <option value="Renovasi" @if ($item->ketersediaan == 'Renovasi') selected @endif>Renovasi
                                </option>
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
