<div class="section" style="background-color: #DDF3FE">
    <div class="container pt-5 pb-5 mt-3" id="kontak">
        <div class="row">
            <div class="col-md-6 mb-2" data-aos="fade-right">
                <h1 class="display-5 fw-bold mb-4">Hubungi Kami</h1>
            </div>
        </div>
        <div class="row">
            <div class="col mb-2" data-aos="fade-left">
                <form id="form-contact" method="POST">
                    @csrf
                    <div class="card mb-5 rounded bg-form-kontak">
                        <div class="card-body p-5">
                            <div class="form-group mb-3">
                                <label for="nama_pengirim" class="form-label fw-bold text-white">Nama Lengkap /
                                    Instansi</label>
                                <input type="text" class="form-control form-control-lg bg-white"
                                    placeholder="Masukan nama lengkap / Instansi" name="nama_pengirim" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email_pengirim" class="form-label fw-bold text-white">E-mail</label>
                                <input type="text" class="form-control form-control-lg bg-white"
                                    placeholder="Masukan alamat E-mail anda" name="email_pengirim" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="pesan_pengirim" class="form-label fw-bold text-white">Pesan</label>
                                <textarea name="pesan_pengirim" id="" cols="30" rows="10"
                                    class="form-control form-control-lg bg-white" placeholder="Tulis pesan anda disini" required></textarea>
                            </div>
                            <div class="form-group mb-5">
                                <div class="d-flex mb-3">
                                    <div id="captcha1">{!! Captcha::img() !!}</div>
                                    <button type="button" class="mx-3 btn btn-lg btn-light" class="reload"
                                        id="reload1">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
                                    <button class="mx-3 btn btn-light btn-lg" type="button" id="loading-btn1" disabled
                                        style="display: none">
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span class="visually-hidden" role="status">Loading...</span>
                                    </button>
                                </div>
                                <input type="text" name="captcha"
                                    class="form-control form-control-lg bg-white @error('captcha') is-invalid @enderror"
                                    placeholder="Captcha" required autocomplete="off">
                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-4 data-aos="fade-left">
            <button class="btn btn-custom btn-lg fw-bold px-5 w-50" id="submit-button-contact" type="submit">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    style="display: none;"></span>
                Kirim</button>
        </div>
        </form>
    </div>
</div>
