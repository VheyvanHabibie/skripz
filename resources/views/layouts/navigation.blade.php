<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
    <div class="container-fluid">
        <a class="navbar-brand mx-lg-1 mr-0" href="./index.html">
            <img src="{{ asset(setting('logo')) }}" id="logo" class="navbar-brand-img brand-md" alt="Image-Logo">
            </img>
        </a>
        <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
            <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span class="ml-lg-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('datamaster.index', 'dosen.index','dosen.create', 'dosen.edit', 'dosen.show', 'dosen-pembimbing.index', 'mahasiswa-bimbingan.index', 'sekretariat.index', 'bimbingan.index', 'topik-skripsi.index', 'kelompok-keilmuan.index', 'mitra.index','mitra.create','mitra.edit', 'ruang.index', 'tahun-akademik.index', 'jabatan.index', 'kaprodi.index', 'predikat-kelulusan.index', 'bidang-keahlian.index', 'keilmuan.index', 'sumber-referensi.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('datamaster.index') }}">
                        <span class="ml-lg-2">Data Master</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('jadwal.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('jadwal.index') }}">
                        <span class="ml-lg-2">Jadwal</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('progres-bimbingan.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('progres-bimbingan.index') }}">
                        <span class="ml-lg-2">Progress Bimbingan</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('repository-skripsi.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('repository-skripsi.index') }}">
                        <span class="ml-lg-2">Repository Skripsi</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('penilaian.index', 'sidang.index', 'seminar.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('penilaian.index') }}">
                        <span class="ml-lg-2">Penilaian</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('laporan.index', 'laporan-usulan-proposal.index', 'laporan-kemajuan-seminar.index', 'laporan-bimbingan.index', 'laporan-kemajuan-sidang.index', 'laporan-yudisium.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('laporan.index') }}">
                        <span class="ml-lg-2">Laporan</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('berkas.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('berkas.index') }}">
                        <span class="ml-lg-2">Pengaturan Berkas</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('setting') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('setting') }}">
                        <span class="ml-lg-2">Pengaturan Aplikasi</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('management.index', 'management-role.index', 'management-role.create', 'management-role.edit', 'management-user.index', 'management-user.create', 'management-user.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('management.index') }}">
                        <span class="ml-lg-2">Management Akun</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('tentang-kami.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tentang-kami.index') }}">
                        <span class="ml-lg-2">Tentang</span>
                    </a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item">
                <a class="nav-link text-muted text-end" href="./#" data-toggle="modal" data-target=".modal-notif">
                    <small class="text-dark font-weight-bold">{{ Auth::user()->name }}</small><br>
                    <small class="text-dark">{{ Auth::user()->role->name }}</small>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar avatar-sm mt-2">
                        <img src="{{ asset(Auth::user()->foto) }}" alt="..." class="avatar-img rounded-circle">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="Logout();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
