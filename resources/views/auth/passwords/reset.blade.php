@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/SkripZ.png') }}" height="80" width="80" alt="logo"
                                style="margin-bottom: 10px">
                        </div>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            {{-- <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Masukan email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password"
                                        placeholder="Masukan kata sandi baru">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Konfirmasi kata sandi">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-blueblack btn-lg btn-block">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
