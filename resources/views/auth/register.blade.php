@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-md-4">
                <div class="card shadow mt-5 mb-5">
                    <div class="card-body p-5">
                        <div class="text-center mb-3">
                            <img src="{{ asset(setting('logo')) }}" height="80" width="80" alt="logo"
                                style="margin-bottom: 10px">
                        </div>
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active" id="pills-home-tab" data-toggle="pill"
                                    href="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Akademik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" id="pills-profile-tab" data-toggle="pill"
                                    href="#pills-profile" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">Perusahaan</a>
                        </ul>
                        <div class="tab-content mb-1" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <h6 class="text-dark">Catatan :</h6>
                                <h6 class="text-dark">Pendaftar Akademik Hanya Diperuntukan untuk Ketua Program Studi.</h6>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <input type="hidden" value="2" name="role_id">
                                    <div class="form-group">
                                        <label for="name" class="required">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="required">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <?php use App\Models\PerguruanTinggi; ?>

                                    <div class="form-group">
                                        <label for="pts_id">Perguruan Tinggi</label>
                                        <select id="simple-select2" name="pts_id" class="form-control select2">
                                            <option value="">-- Pilih Perguruan Tinggi --</option>
                                            @foreach (PerguruanTinggi::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_perguruan_tinggi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="password" class="required">Kata Sandi</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password_confirmation" class="required">Konfirmasi Kata Sandi</label>
                                        <input type="password" id="password_confirmation"
                                            class="form-control form-control-lg" name="password_confirmation" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="d-flex mb-3">
                                            <div id="captcha1">{!! captcha_img() !!}</div>
                                            <button type="button" class="mx-3 btn btn-lg btn-blueblack" class="reload"
                                                id="reload1">
                                                <i class="fe fe-refresh-cw"></i>
                                            </button>
                                            <button class="mx-3 btn btn-blueblack btn-lg" type="button" id="loading-btn1"
                                                disabled style="display: none">
                                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                                <span class="visually-hidden" role="status"></span>
                                            </button>
                                        </div>
                                        <input type="text" name="captcha1"
                                            class="form-control form-control-lg bg-white @error('captcha1') is-invalid @enderror"
                                            placeholder="Captcha" required autocomplete="off">
                                        @error('captcha1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-lg btn-blueblack btn-block" type="submit">Daftar</button>
                                    <p class="text-center mt-4">Sudah Punya Akun ? <a
                                            href="{{ route('login') }}">Masuk</a>
                                    </p>
                                    <p class="mt-4 mb-3 text-muted text-center font-weight-bold"> <a
                                            href="/">Copyright</a>
                                        &copy;
                                        {{ setting('tahun') }} V{{ setting('versi') }} {{ setting('copyright') }}
                                    </p>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <h6 class="text-dark">Catatan :</h6>
                                <h6 class="text-dark">Pendaftar Industri Hanya Diperuntukan untuk Manager HRD, HRD, atau
                                    Perwakilan Perusahaan.</h6>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <input type="hidden" value="6" name="role_id">
                                    <div class="form-group">
                                        <label for="name" class="required">Nama Lengkap</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="required">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="password" class="required">Kata Sandi</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password_confirmation" class="required">Konfirmasi Kata Sandi</label>
                                        <input type="password" id="password_confirmation"
                                            class="form-control form-control-lg" name="password_confirmation" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="d-flex mb-3">
                                            <div id="captcha">{!! captcha_img() !!}</div>
                                            <button type="button" class="mx-3 btn btn-lg btn-blueblack" class="reload"
                                                id="reload">
                                                <i class="fe fe-refresh-cw"></i>
                                            </button>
                                            <button class="mx-3 btn btn-blueblack btn-lg" type="button" id="loading-btn"
                                                disabled style="display: none">
                                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                                <span class="visually-hidden" role="status"></span>
                                            </button>
                                        </div>
                                        <input type="text" name="captcha2"
                                            class="form-control form-control-lg bg-white @error('captcha2') is-invalid @enderror"
                                            placeholder="Captcha" required autocomplete="off">
                                        @error('captcha2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-lg btn-blueblack btn-block" type="submit"
                                        style="border-radius: 7px;">Daftar</button>
                                    <p class="text-center mt-4">Sudah Punya Akun ? <a
                                            href="{{ route('login') }}">Masuk</a>
                                    </p>
                                    <p class="mt-4 mb-3 text-muted text-center font-weight-bold"> <a
                                            href="/">Copyright</a>
                                        &copy;
                                        {{ setting('tahun') }} V{{ setting('versi') }} {{ setting('copyright') }}
                                    </p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
