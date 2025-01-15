@foreach ($topiksk as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editModalLabel">Edit Data Topik Skripsi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('topik-skripsi.update', $item->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="keilmuan_id" class="required">Keilmuan</label>
                            <select class="form-control select2" id="keilmuan_id" name="keilmuan_id"
                                required>
                                @foreach ($keilmuan as $data)
                                    @if (old('keilmuan_id', $data->id) == $item->keilmuan->id)
                                        <option value="{{ $data->id }}" selected hidden>
                                            {{ $data->nama_keilmuan }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->nama_keilmuan }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul_topik" class="required">Judul Topik</label>
                            <input type="text" class="form-control" id="judul_topik" name="judul_topik"
                                value="{{ $item->judul_topik }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kata_kunci" class="required">Kata Kunci</label>
                            <input type="text" class="form-control" id="kata_kunci" name="kata_kunci"
                                value="{{ $item->kata_kunci }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="required">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $item->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="link" class="required">Link Referensi (3 Referensi)</label>
                            @if ($item->link)
                                @php
                                    $links = json_decode($item->link);
                                    $linksAsString = implode(', ', $links);
                                @endphp
                                <textarea class="form-control" id="link" name="link" rows="4" placeholder="Tambahkan pemisah koma setiap link" required>{{ $linksAsString }}</textarea>
                            @else
                                <textarea class="form-control" id="link" name="link" rows="4" placeholder="Tambahkan pemisah koma setiap link" required></textarea>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="sumber_id" class="required">Sumber Referensi</label>
                            <select class="form-control select2" id="sumber_id" name="sumber_id"
                                required>
                                @foreach ($sumber as $data)
                                    @if (old('sumber_id', $data->id) == $item->sumber->id)
                                        <option value="{{ $data->id }}" selected hidden>
                                            {{ $data->sumber_referensi }}
                                        </option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->sumber_referensi }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="status_topik" class="required">Status Topik</label>
                            <select name="status_topik" id="status_topik" class="form-control">
                                <option value="" hidden>Pilih Status</option>
                                <option value="Diajukan" @if ($item->status_topik == 'Diajukan') selected @endif>Diajukan</option>
                                <option value="Disetujui" @if ($item->status_topik == 'Disetujui') selected @endif>Disetujui</option>
                                <option value="Ditolak" @if ($item->status_topik == 'Ditolak') selected @endif>Ditolak</option>
                            </select>
                        </div> --}}
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
