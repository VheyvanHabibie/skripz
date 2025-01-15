@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-body text-center p-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center">
                                <img src="{{ asset(setting('logo')) }}" height="80" width="80" alt="logo"
                                    style="margin-bottom: 10px">
                            </div>
                            <h4 class="text-start mb-3">Masuk</h4>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" placeholder="Kata Sandi" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="d-flex mb-3">
                                    <div id="captcha1">{!! Captcha::img() !!}</div>
                                    <button type="button" class="mx-3 btn btn-lg btn-blueblack" class="reload"
                                        id="reload1">
                                        <i class="fe fe-refresh-cw"></i>
                                    </button>
                                    <button class="mx-3 btn btn-blueblack btn-lg" type="button" id="loading-btn1" disabled
                                        style="display: none">
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span class="visually-hidden" role="status"></span>
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
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-right mb-3">Lupa kata
                                    sandi ?</a>
                            @endif
                            <button class="btn btn-lg btn-blueblack btn-block" type="submit">Masuk</button>
                            <p class="mt-4 mb-2 text-muted">Belum punya akun ? <a href="{{ route('register') }}">Daftar</a>
                            </p>
                            </p>
                            <p class="mt-4 mb-3 text-muted font-weight-bold"> <a href="/">Copyright</a> &copy;
                                {{ setting('tahun') }} V{{ setting('versi') }} {{ setting('copyright') }}
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
