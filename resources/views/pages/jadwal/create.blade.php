                <!-- new event modal -->
                <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="varyModalLabel">Jadwal Baru</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('jadwal.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="mahasiswa_id" class="required">Mahasiswa</label>
                                        <select class="form-control select2" id="mahasiswa_id" name="mahasiswa_id"
                                            required>
                                            @foreach ($mahasiswa as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dosen_id" class="required">Dosen</label>
                                        <select class="form-control select2" id="dosen_id" name="dosen_id" required>
                                            @foreach ($dosen as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            placeholder="Buat Judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan" class="col-form-label">Catatan</label>
                                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Buat Catatan"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                            <select id="jenis_kegiatan" class="form-control select2"
                                                name="jenis_kegiatan">
                                                <option value="Seminar">Seminar</option>
                                                <option value="Sidang">Sidang</option>
                                                <option value="Bimbingan">Bimbingan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ruang_id" class="required">Pilih Ruang</label>
                                            <select class="form-control select2" id="ruang_id" name="ruang_id"
                                                required>
                                                @foreach ($ruang as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_ruang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                            <input type="date" class="form-control" id="tanggal_mulai"
                                                name="tanggal_mulai">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jam_mulai">Jam Mulai</label>
                                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                            <input type="date" class="form-control" id="tanggal_selesai"
                                                name="tanggal_selesai">
                                            <span id="error_message" class="small" style="color: red;"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jam_selesai">Jam Selesai</label>
                                            <input type="time" class="form-control" id="jam_selesai"
                                                name="jam_selesai">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="submit" class="btn mb-2 btn-primary">Buat Jadwal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- new event modal -->
