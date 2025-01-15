<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="icon" href="{{ asset('logo/a.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme">
</head>

<body class="light " style="background-color: #234666;">
    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center vh-100 d-flex align-items-center">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body text-center p-5">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="text-center">
                                        <img src="{{ asset(setting('logo')) }}" height="80" width="80"
                                            alt="logo" style="margin-bottom: 10px">
                                    </div>
                                    <p class="text-muted">Masukkan alamat email Anda dan kami akan mengirimkan email
                                        berisi petunjuk untuk mengatur ulang kata sandi Anda
                                    </p>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-lg btn-blueblack btn-block" type="submit">Kirim
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-2 text-muted"><a href="{{ route('login') }}">Kembali ke Login </a>
                                    </p>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
