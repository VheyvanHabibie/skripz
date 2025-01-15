@foreach ($sekretariat as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Sekretariat</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('sekretariat.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_sekretariat" class="required">Nama Sekretariat</label>
                            <input type="text" class="form-control" id="nama_sekretariat" name="nama_sekretariat"
                                value="{{ $item->nama_sekretariat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nip" class="required">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Maksimal : 18 Digit" onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 18)" min="0"
                                value="{{ $item->nip }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_id" class="required">Jabatan</label>
                            <select class="form-control select2" id="jabatan_id" name="jabatan_id"
                                required>
                                @foreach ($jabatan as $data)
                                    @if (old('jabatan_id', $data->id ) ?? 0 == $item->jabatan->id)
                                        <option value="{{ $data->id }}" selected hidden>
                                            {{ $data->nama_jabatan }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->nama_jabatan }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email" class="required">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $item->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon" class="required">No Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" pattern="^08\d{9,}$" placeholder="Contoh: 081234567890" onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 18)" min="0"
                                value="{{ $item->no_telepon }}" required>
                        </div>
                        <div class="form-group">
                            <label for="simpleinput" class="required">Foto</label>
                            <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                    diizinkan: JPG, JPEG, PNG.</small></p>
                            <input type="file" class="form-control-file" id="imageInput"
                                name="foto" accept="image/*" onchange="previewImage()"
                                value="{{ $item ? asset($item->foto) : '' }}">
                            @if ($item && $item->foto)
                                <img id="preview" src="{{ asset($item->foto) }}" alt="Preview Image"
                                    height="100" width="100" style="display: block;">
                            @else
                                <h5 class="text-muted mt-4">Belum Ada foto</h5>
                            @endif
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
