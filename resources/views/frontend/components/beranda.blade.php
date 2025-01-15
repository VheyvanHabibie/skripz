<div class="section beranda">
    <div class="container pt-5 pb-5" style="min-height: 100vh" id="beranda">
        <div class="row align-items-center">
            <div class="col-md-6 mb-5" data-aos="fade-right">
                <div style="border-top: 2px solid #001688; width: 8%; margin: 20px 0;"></div>
                <h1 class="text mb-4 title" style="color: #001688">
                    <i>One Step Closer to</i>
                    <span class="fw-bold">Success</span>
                </h1>

                <div class="text h4" style="color: #001688"><span class="fw-bold fs-3 text">Skrip<span
                            style="color: #3BA0BD">Z</span></span> {!! $beranda->description !!}</div>
                @guest
                    @if (Route::has('register'))
                        <a class="btn btn-custom fs-5 bg-unduh px-4 fw-bold" href="{{ route('register') }}">Daftar
                            Sekarang</a>
                    @endif
                @else
                    @php
                        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
                    @endphp

                    @if ($user->role->name == 'Ketua Program Studi')
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold" href="{{ route('kaprodi.dashboard') }}">Dasbor
                        </a>
                    @elseif($user->role->name == 'Sekretariat')
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold"
                            href="{{ route('sekretariat.dashboard') }}">Dasbor</a>
                    @elseif($user->role->name == 'Dosen')
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold" href="{{ route('dosen.dashboard') }}">Dasbor
                        </a>
                    @elseif($user->role->name == 'Mahasiswa')
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold"
                            href="{{ route('mahasiswa.dashboard') }}">Dasbor </a>
                    @elseif($user->role->name == 'Industri')
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold" href="{{ route('industri.dashboard') }}">Dasbor
                        </a>
                    @elseif($user->role->name == 'SuperAdmin')
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold"
                            href="{{ route('superadmin.dashboard') }}">Dasbor </a>
                    @else
                        <a class="btn btn-outline-light btn-lg px-4 fw-bold" href="{{ route('dashboard') }}">Dasbor</a>
                    @endif @endguest
                </div>
                <div class="col-md-6 text-end" data-aos="fade-left">
                    <img src="{{ asset('assets/images/vector-beranda.png') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="fw-bold text" style="color: #001688">Mitra Kami</h3>
                </div>
                <div class="col-6">
                    <div id="mitra-carousel" class="owl-carousel owl-theme">
                        @foreach ($mitra as $item)
                            <div class="item">
                                <img src="{{ asset($item->logo) }}" class="img-fluid rounded w-100" alt="Logo Mitra">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
