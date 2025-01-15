<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createModalLabel">Tambah Data Sekretariat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sekretariat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_sekretariat" class="required">Nama Sekretariat</label>
                        <input type="text" class="form-control" id="nama_sekretariat" name="nama_sekretariat"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nip" class="required">NIP</label>
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="Maksimal : 18 Digit" onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 18)" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_id" class="required">Jabatan</label>
                        <select class="form-control select2" id="jabatan_id" name="jabatan_id" required>
                            @foreach ($jabatan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon" class="required">No Telepon</label>
                        <input type="number" class="form-control" id="no_telepon" name="no_telepon" onkeypress="return hanyaAngka(event)" oninput="limitDigit(event, 13)" min="0" pattern="^08\d{9,}$" placeholder="Contoh: 081234567890" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="profile-picture-input" class="required">Foto</label>
                        <p class="text-muted"><small>Ukuran gambar maksimum: 2MB. Format gambar yang
                                diizinkan: JPG, JPEG, PNG.</small></p>
                        <input type="file" name="foto" id="profile-picture-input" class="form-control-file"
                            accept="image/*" onchange="previewProfilePicture()" required>
                        <br>
                        <div class="profile-picture-container">
                            <img id="profile-picture-preview" src="{{ asset('assets/images/Profiledefault.png') }}"
                                alt="Profile Picture" height="100" width="100"style="display: none;">
                        </div>
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
