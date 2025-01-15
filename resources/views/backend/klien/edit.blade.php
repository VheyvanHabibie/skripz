@foreach ($klien as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Edit Klien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('klien.update', $item->id) }}" method="POST" class="needs-validation"
                    novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_klien" class="col-form-label">Nama Klien</label>
                            <input type="text" class="form-control" name="nama_klien"
                                value="{{ old('nama_klien', $item->nama_klien) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-form-label">Logo Klien</label>
                            <p class="small text-danger">Maksimal Gambar: 2MB & Ukuran Gambar Harus 40x40 </p>
                            <input type="file" class="form-control-file form-custom" name="logo" accept="image/*"
                                value="{{ asset($item->logo) }}">
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
