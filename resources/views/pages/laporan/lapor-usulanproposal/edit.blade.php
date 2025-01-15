@foreach ($proposal as $item)
<div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="editModalLabel">Edit Laporan Usulan Proposal</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-usulan-proposal.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_proposal" class="required">Judul Proposal</label>
                        <input type="text" class="form-control" id="judul_proposal" name="judul_proposal" value="{{ $item->judul_proposal }}" required>
                    </div>
                    <div class="form-group">
                        <label for="dosen_pembimbing_id" class="required">Dosen Pembimbing</label>
                        <select class="form-control select2" id="dosen_pembimbing_id" name="dosen_pembimbing_id" required>
                            @foreach ($dospem as $data)
                            @if (old('dosen_pembimbing_id', $data->id) == $item->id)
                                <option value="{{ $data->id }}" selected hidden>{{ $data->dosen->nama_dosen }}
                                </option>
                            @else
                                <option value="{{ $data->id }}">{{ $data->dosen->nama_dosen }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bidang_kajian" class="required">Bidang Kajian</label>
                        <input type="text" class="form-control" id="bidang_kajian" name="bidang_kajian" value="{{ $item->bidang_kajian }}" required>
                    </div>
                    <div class="form-group">
                        <label for="file_laporan" class="required">File Laporan</label>
                        <p class="small text-muted">Format file (.pdf , .doc , .docx) ukuran maksimal 4MB</p>
                        <input type="file" class="form-control-file" id="file_laporan" name="file_laporan" value="{{ $item->file_laporan }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengajuan" class="required">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ $item->tanggal_pengajuan }}" required>
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
