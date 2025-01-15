@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <h5 class="h5 mb-4">Selamat Datang, {{ Auth::user()->role->name }} !</h5>
                <form id="job-search-form" class="mb-3">
                    <div class="d-flex">
                        <input class="form-control form-control-lg mr-2 bg-white" name="search_key" id="search_key"
                            placeholder="Cari berdasarkan posisi pekerjaan atau lokasi">
                        <button type="submit" class="btn btn-info px-5">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-smooth custom-card h-100 custom-card bg-white">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="h7 text-dark font-weight-bold">Total Dosen</h6>
                                        <h4 class="text-dark font-weight-bold">{{ $dosen->count() }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-24 bi-person-check text-dark font-weight-bold mb-0"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-smooth custom-card h-100 custom-card bg-white">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="h7 text-dark font-weight-bold">Total Mahasiswa</h6>
                                        <h4 class="text-dark font-weight-bold">{{ $mahasiswa->count() }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-24 bi-mortarboard-fill text-dark font-weight-bold mb-0"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-smooth custom-card h-100 custom-card bg-white">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="h7 text-dark font-weight-bold">Total Industri</h6>
                                        <h4 class="text-dark font-weight-bold">{{ $mitra->count() }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-24 bi-tools text-dark font-weight-bold mb-0"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-smooth custom-card mb-3">
                    <div class="card-body p-5">
                        <div class="calendar">
                            <div class="header">
                                <div class="month"></div>
                                <div class="btns">
                                    <div class="btn today-btn">
                                        <i class="fe fe-12 bi-calendar-day"></i>
                                    </div>
                                    <div class="btn prev-btn">
                                        <i class="fe fe-12 bi-chevron-left"></i>
                                    </div>
                                    <div class="btn next-btn">
                                        <i class="fe fe-12 bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="weekdays mb-3">
                                <div class="day">Min</div> <!-- Minggu -->
                                <div class="day">Sen</div> <!-- Senin -->
                                <div class="day">Sel</div> <!-- Selasa -->
                                <div class="day">Rab</div> <!-- Rabu -->
                                <div class="day">Kam</div> <!-- Kamis -->
                                <div class="day">Jum</div> <!-- Jumat -->
                                <div class="day">Sab</div> <!-- Sabtu -->
                            </div>
                            <div class="days">
                                <!-- lets add days using js -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-smooth custom-card mb-2">
                    <div class="card-body" data-simplebar style="max-height:80%; overflow-y: auto; overflow-x: hidden;">
                        <h6 class="mb-4 h6">Hari Ini</h6>
                        @if ($penjadwalanHariIni->isEmpty())
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class="small text-muted">Tidak ada jadwal hari
                                        ini.</p>
                                </div>
                            </div>
                        @else
                            @foreach ($penjadwalanHariIni as $data)
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                        <small class="text-dark font-weight-medium ml-2">
                                            <span
                                                class="dot dot-lg
                                            @if ($data->jenis_kegiatan == 'Sidang') bg-primary
                                            @elseif ($data->jenis_kegiatan == 'Seminar') bg-warning
                                            @elseif ($data->jenis_kegiatan == 'Bimbingan') bg-purple @endif
                                            mr-1">
                                            </span>
                                            {{ $data->jenis_kegiatan }}
                                            {{ $data->mahasiswa->name }}
                                        </small>
                                    </div>
                                    <div class="col-md-auto">
                                        <small class="text-muted float-right">
                                            {{ date('h.i', strtotime($data->jam_mulai)) }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <h6 class="mb-3 mt-3 h6">Besok</h6>
                        @if ($penjadwalanBesok->isEmpty())
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class=" small text-muted">Tidak ada jadwal untuk
                                        besok.</p>
                                </div>
                            </div>
                        @else
                            @foreach ($penjadwalanBesok as $data)
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                        <small class="text-dark font-weight-medium ml-2">
                                            <span
                                                class="dot dot-lg
                                            @if ($data->jenis_kegiatan == 'Sidang') bg-primary
                                            @elseif ($data->jenis_kegiatan == 'Seminar') bg-warning
                                            @elseif ($data->jenis_kegiatan == 'Bimbingan') bg-purple @endif
                                            mr-1">
                                            </span>
                                            {{ $data->jenis_kegiatan }}
                                            {{ $data->mahasiswa->name }}
                                        </small>
                                    </div>
                                    <div class="col-md-auto">
                                        <small class="text-muted float-right">
                                            {{ date('h.i', strtotime($data->jam_mulai)) }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <h6 class="mb-3 mt-3 h6">Minggu Ini</h6>
                        @if ($penjadwalanMingguIni->isEmpty())
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class=" small text-muted">Tidak ada jadwal untuk
                                        minggu ini.</p>
                                </div>
                            </div>
                        @else
                            @foreach ($penjadwalanMingguIni as $data)
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                        <small class="text-dark font-weight-medium ml-2">
                                            <span
                                                class="dot dot-lg
                                            @if ($data->jenis_kegiatan == 'Sidang') bg-primary
                                            @elseif ($data->jenis_kegiatan == 'Seminar') bg-warning
                                            @elseif ($data->jenis_kegiatan == 'Bimbingan') bg-purple @endif
                                            mr-1">
                                            </span>
                                            {{ $data->jenis_kegiatan }}
                                            {{ $data->mahasiswa->name }}
                                        </small>
                                    </div>
                                    <div class="col-md-auto">
                                        <small class="text-muted float-right">
                                            {{ date('h.i', strtotime($data->jam_mulai)) }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div> <!-- / .card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
