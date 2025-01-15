@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">


                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col">
                                <h5>Informasi Jadwal </h5>
                            </div>
                            <div class="col-auto">
                                <button class="btn mb-0 btn-primary" style="float: right;" type="button" data-toggle="modal"
                                    data-target="#eventModal" data-whatever="@mdo">
                                    Buat Jadwal <span class="fe fe-plus fe-15"></span>
                                </button>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-md-8 mb-2">
                                {{-- Error Validation --}}
                                <x-error-validation-message errors="$errors" />

                                {{-- Alert Message --}}
                                @if (session()->has('success'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-success-message action="{{ session()->get('success') }}" />
                                        </div>
                                    </div>
                                @endif
                                <div id='calendar' class="mb-2"></div>
                                <h6 class="text-center">Legenda</h6>
                                <center>
                                    <small class="text-dark font-weight-medium ml-2"><span
                                            class="dot dot-lg bg-primary mr-1"></span>Sidang</small>
                                    <small class="text-dark font-weight-medium ml-2"><span
                                            class="dot dot-lg bg-warning mr-1"></span>Seminar</small>
                                    <small class="text-dark font-weight-medium ml-2"><span
                                            class="dot dot-lg bg-purple mr-1"></span>Bimbingan</small>
                                </center>
                                {{-- <div class="card shadow">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="semuajadwal" data-toggle="tab" href="#jadwal"
                                                    role="tab" aria-controls="semuajadwal" aria-selected="true">Semua Jadwal</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="seminarproposal" data-toggle="tab" href="#seminar"
                                                    role="tab" aria-controls="seminarproposal" aria-selected="false">Seminar
                                                    Proposal</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="seminarkemajuan" data-toggle="tab" href="#kemajuan"
                                                    role="tab" aria-controls="seminarkemajuan" aria-selected="false">Seminar
                                                    Kemajuan
                                                    Skripsi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="sidangakhir" data-toggle="tab" href="#akhir" role="tab"
                                                    aria-controls="sidangakhir" aria-selected="false">Sidang Akhir</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="yudisium" data-toggle="tab" href="#yudisiums"
                                                    role="tab" aria-controls="yudisium" aria-selected="false">Yudisium</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="jadwal" role="tabpanel"
                                                aria-labelledby="semuajadwal">
                                                <div class="row mb-2">
                                                    @foreach ($penjadwalan as $item)
                                                        <div class="col-md-6 mb-2">
                                                            <div class="card shadow custom-hover custom-card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-auto mb-2">
                                                                            <img src="{{ asset('assets/images/face-3.jpg') }}"
                                                                                alt="..." class="custom-card" height="50"
                                                                                width="50">
                                                                        </div>
                                                                        <div class="col-md-auto mb-2">
                                                                            <h6>{{ $item->judul }}</h6>
                                                                            <div class="my-0 text-muted small mb-2">
                                                                                <?php \Carbon\Carbon::setLocale('id'); ?>

                                                                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('l') }}
                                                                                -
                                                                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('l') }},
                                                                                {{ date('h:i A', strtotime($item->jam_selesai)) }}
                                                                            </div>


                                                                            <div class="row align-items-center">
                                                                                <div class="col-auto">
                                                                                    <a href="profile-posts.html"
                                                                                        class="avatar avatar-sm ml-2 ">
                                                                                        <img src="{{ asset('assets/images/face-3.jpg') }}"
                                                                                            alt="..."
                                                                                            class="avatar-img rounded-circle">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="small mb-0">
                                                                                        <strong>{{ $item->nama_dosen }}</strong>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="seminar" role="tabpanel"
                                                aria-labelledby="seminarproposal">
                                                Anim
                                                pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                                squid. 3
                                                wolf
                                                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                                laborum
                                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee
                                                nulla
                                                assumenda shoreditch et. </div>
                                            <div class="tab-pane fade" id="kemajuan" role="tabpanel"
                                                aria-labelledby="seminarkemajuan">
                                                Anim
                                                pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                                squid. 3
                                                wolf
                                                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                                laborum
                                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee
                                                nulla
                                                assumenda shoreditch et. </div>
                                            <div class="tab-pane fade" id="akhir" role="tabpanel"
                                                aria-labelledby="sidangakhir">
                                                Anim
                                                pariatur
                                                cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                                wolf
                                                moon
                                                officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                                laborum
                                                eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                                nulla
                                                assumenda
                                                shoreditch et. </div>
                                            <div class="tab-pane fade" id="yudisiums" role="tabpanel"
                                                aria-labelledby="yudisium"> Anim
                                                pariatur
                                                cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                                wolf
                                                moon
                                                officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                                laborum
                                                eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                                nulla
                                                assumenda
                                                shoreditch et. </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <strong>Daftar Jadwal</strong>
                                    </div>
                                    <div class="card-body" data-simplebar
                                        style="max-height:80%; overflow-y: auto; overflow-x: hidden;">
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

                                </div> <!-- / .card -->
                            </div> <!-- / .col-md-6 -->
                        </div>
                    </div>
                </div>

            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    @include('pages.jadwal.create')
    <script>
        /** full calendar */
        var calendarEl = document.getElementById('calendar');
        if (calendarEl) {
            document.addEventListener('DOMContentLoaded', function() {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'id',
                    plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
                    timeZone: 'UTC',
                    themeSystem: 'bootstrap',
                    header: {
                        left: 'today, prev, next',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    buttonText: {
                        today: 'Hari Ini',
                        month: 'Bulan',
                        week: 'Minggu',
                        day: 'Hari',
                        list: 'Daftar'
                    },
                    allDayText: 'Sepanjang Hari',
                    noEventsMessage: 'Tidak ada acara untuk ditampilkan',
                    buttonIcons: {
                        prev: 'fe-arrow-left',
                        next: 'fe-arrow-right',
                        prevYear: 'left-double-arrow',
                        nextYear: 'right-double-arrow'
                    },
                    weekNumbers: true,
                    eventLimit: true,
                    events: [
                        @foreach ($penjadwalan as $item)
                            {
                                title: '{{ date('H:i', strtotime($item['jam_mulai'])) }} {{ $item['jenis_kegiatan'] }} {{ $item['mahasiswa']->name }}',
                                start: '{{ $item['tanggal_mulai'] }}',
                                @if ($item['tanggal_selesai'])
                                    end: '{{ $item['tanggal_selesai'] }}',
                                @endif
                                backgroundColor: getColor('{{ $item['jenis_kegiatan'] }}'),
                                borderColor: getColor('{{ $item['jenis_kegiatan'] }}')
                            },
                        @endforeach
                    ]
                });
                calendar.render();
            });

            function getColor(title) {
                switch (title) {
                    case 'Sidang':
                        return '#1b68ff';
                    case 'Seminar':
                        return '#eea303';
                    case 'Bimbingan':
                        return '#6f42c1';
                    default:
                        return '#3ad29f';
                }
            }
        }
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tanggalMulaiInput = document.getElementById('tanggal_mulai');
        var tanggalSelesaiInput = document.getElementById('tanggal_selesai');
        var errorMessage = document.getElementById('error_message');

        function validateDates() {
            var tanggalMulai = new Date(tanggalMulaiInput.value);
            var tanggalSelesai = new Date(tanggalSelesaiInput.value);

            if (!tanggalMulaiInput.value) {
                errorMessage.textContent = 'Tanggal Mulai harus diisi terlebih dahulu';
                tanggalSelesaiInput.disabled = true;
            } else if (tanggalMulai > tanggalSelesai) {
                errorMessage.textContent = 'Tanggal Selesai harus setelah Tanggal Mulai';
                tanggalSelesaiInput.value = '';
                tanggalSelesaiInput.disabled = true;
            } else {
                errorMessage.textContent = '';
                tanggalSelesaiInput.disabled = false;
            }
        }

        // Panggil fungsi validateDates saat halaman dimuat
        validateDates();

        // Tambahkan event listener untuk memeriksa perubahan pada input tanggal mulai
        tanggalMulaiInput.addEventListener('change', validateDates);

        // Tambahkan event listener untuk memeriksa perubahan pada input tanggal selesai
        tanggalSelesaiInput.addEventListener('change', validateDates);
    });
</script>
@endsection
