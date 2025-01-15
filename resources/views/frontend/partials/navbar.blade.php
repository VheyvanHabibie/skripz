<nav class="navbar navbar-expand-lg navbar-light bg-transparent-blur sticky-top">
    <div class="container">
        <a class="navbar-brand pe-5 py-1 fs-3 fw-bold" href="#">
            <img src="{{ asset('assets/images/skripzz.png') }}" width="50px" alt="Logo">
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item pe-5">
                    <a class="nav-link fw-bold" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link fw-bold" href="#tentang">Tentang</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link fw-bold" href="#layanan">Layanan</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link fw-bold" href="#paket">Paket</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link fw-bold" href="#kontak">Kontak</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @guest
                        @if (Route::has('login'))
                            <a class="btn btn-custom px-4 fw-bold" href="{{ route('login') }}">Masuk</a>
                        @endif
                    @else
                        @php
                            $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
                        @endphp

                        @if ($user->role->name == 'Ketua Program Studi')
                            <a class="btn btn-custom bg-unduh px-4 fw-bold"
                                href="{{ route('kaprodi.dashboard') }}">Dasbor</a>
                        @elseif($user->role->name == 'Sekretariat')
                            <a class="btn btn-custom bg-unduh px-4 fw-bold"
                                href="{{ route('sekretariat.dashboard') }}">Dasbor</a>
                        @elseif($user->role->name == 'Dosen')
                            <a class="btn btn-custom bg-unduh px-4 fw-bold" href="{{ route('dosen.dashboard') }}">Dasbor</a>
                        @elseif($user->role->name == 'Mahasiswa')
                            <a class="btn btn-custom bg-unduh px-4 fw-bold"
                                href="{{ route('mahasiswa.dashboard') }}">Dasbor</a>
                        @elseif($user->role->name == 'Industri')
                            <a class="btn btn-custom bg-unduh px-4 fw-bold"
                                href="{{ route('industri.dashboard') }}">Dasbor</a>
                        @elseif($user->role->name == 'SuperAdmin')
                            <a class="btn btn-custom bg-unduh px-4 fw-bold"
                                href="{{ route('superadmin.dashboard') }}">Dasbor</a>
                        @else
                            <a class="btn btn-custom bg-unduh px-4 fw-bold" href="{{ route('dashboard') }}">Dasbor</a>
                        @endif @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
