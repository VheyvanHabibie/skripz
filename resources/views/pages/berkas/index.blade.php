@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 my-2">
                        <div class="accordion w-100" id="accordion1">
                            <a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1"
                                aria-expanded="false" aria-controls="collapse1" class="collapsed text-decoration-none">
                                <div class="card shadow-smooth custom-card mb-2">
                                    <div class="card-header" id="heading1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <strong>Form Berkas Assesment Kesiapan Sidang Mahasiswa</strong>
                                            <i class="fe fe-plus fe-16 text-dark"></i>
                                        </div>
                                    </div>
                                    <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                        data-parent="#accordion1" style="">
                                        <div class="card-body">
                                            <form action="{{ route('perbaikan.update') }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="toolbar row mb-3">
                                                    <div class="col ml-auto">
                                                        <div class="dropdown float-right">
                                                            <button class="btn btn-primary float-right ml-3"
                                                                type="submit">Simpan
                                                            </button>
                                                            <button class="btn btn-primary float-right ml-3" type="button"
                                                                data-toggle="modal" data-target="#createModalPerbaikan"
                                                                data-whatever="@mdo">Tambah +</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- table -->
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover mb-5">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center font-weight-bold text-dark">No</th>
                                                                <th class="text-center font-weight-bold text-dark">BAB</th>
                                                                <th class="text-center font-weight-bold text-dark">HAL YANG
                                                                    HARUS
                                                                    DIPERBAIKI</th>
                                                                <th class="text-center font-weight-bold text-dark">SELESAI
                                                                    *)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($perbaikan as $item)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td class="text-center">{{ $item->bab }}</td>
                                                                    <td>{{ $item->perbaikan }}</td>
                                                                    <td class="text-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="hidden"
                                                                                name="perbaikan[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                name="perbaikan[{{ $item->id }}][selesai]"
                                                                                id="customCheck{{ $item->id }}"
                                                                                value="1"
                                                                                {{ $item->selesai ? 'checked' : '' }}>
                                                                            <label class="custom-control-label"
                                                                                for="customCheck{{ $item->id }}"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                            <!-- table -->
                                            <form action="{{ route('persyaratan.update') }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="toolbar row mb-3">
                                                    <div class="col ml-auto">
                                                        <div class="dropdown float-right">
                                                            <button class="btn btn-primary float-right ml-3"
                                                                type="submit">Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center font-weight-bold text-dark">No</th>
                                                                <th class="text-center font-weight-bold text-dark">
                                                                    Persyaratan</th>
                                                                <th class="text-center font-weight-bold text-dark">Cek list
                                                                    (diisi oleh
                                                                    petugas)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($persyaratan as $item)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td>{{ $item->persyaratan }}</td>
                                                                    <td class="text-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="hidden"
                                                                                name="persyaratan[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                name="persyaratan[{{ $item->id }}][status]"
                                                                                id="persyaratanCheck{{ $item->id }}"
                                                                                value="1"
                                                                                {{ $item->status ? 'checked' : '' }}>
                                                                            <label class="custom-control-label"
                                                                                for="persyaratanCheck{{ $item->id }}"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a role="button" href="#collapse2" data-toggle="collapse" data-target="#collapse2"
                                aria-expanded="false" aria-controls="collapse2" class="collapsed text-decoration-none">
                                <div class="card shadow-smooth custom-card mb-2">
                                    <div class="card-header" id="heading1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <strong>Berkas Penilaian Seminar</strong>
                                            <i class="fe fe-plus fe-16 text-dark"></i>
                                        </div>
                                    </div>
                                    <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                        data-parent="#accordion1" style="">
                                        <div class="card-body">
                                            <!-- table -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover mb-5">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center font-weight-bold text-dark">No</th>
                                                            <th colspan="2"
                                                                class="text-center font-weight-bold text-dark">Aspek
                                                                yang
                                                                di nilai</th>
                                                            <th colspan="2"
                                                                class="text-center font-weight-bold text-dark">Nilai
                                                            </th>
                                                            <th class="text-center font-weight-bold text-dark">Total Nilai
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        {{-- Tulisan Start --}}
                                                        <tr>
                                                            <th class="text-center"><b>I</b></th>
                                                            <th colspan="2"><b>Tulisan</b></th>
                                                            <th class="text-center" colspan="2">
                                                                <b>{{ $tulisan->sum('nilai') }}</b>
                                                            </th>
                                                            <th rowspan="{{ $tulisan->count() + 1 }}"></th>
                                                        </tr>
                                                        @foreach ($tulisan as $item)
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td>{{ $item->tulisan }}</td>
                                                                <td class="text-center">{{ $item->nilai }}</td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        @endforeach
                                                        {{-- Tulisan End --}}

                                                        {{-- Presentasi Start --}}
                                                        <tr>
                                                            <th class="text-center"><b>II</b></th>
                                                            <th colspan="2"><b>Presentasi</b></th>
                                                            <th class="text-center" colspan="2">
                                                                <b>{{ $presentasi->sum('nilai') }}</b>
                                                            </th>
                                                            <th rowspan="{{ $presentasi->count() + 1 }}"></th>
                                                        </tr>
                                                        @foreach ($presentasi as $item)
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td>{{ $item->presentasi }}</td>
                                                                <td class="text-center">{{ $item->nilai }}</td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        @endforeach
                                                        {{-- Presentasi End --}}

                                                        {{-- Penguasaan Materi Start --}}
                                                        <tr>
                                                            <th class="text-center"><b>III</b></th>
                                                            <th colspan="2"><b>Penguasaan Materi</b></th>
                                                            <th class="text-center" colspan="2">
                                                                <b>{{ $penguasaan->sum('nilai') }}</b>
                                                            </th>
                                                            <th rowspan="{{ $penguasaan->count() + 1 }}"></th>
                                                        </tr>
                                                        @foreach ($penguasaan as $item)
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td>{{ $item->penguasaan }}</td>
                                                                <td class="text-center">{{ $item->nilai }}</td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        @endforeach
                                                        {{-- Penguasaan Materi End --}}

                                                        {{-- Kualitas Produk Start --}}
                                                        <tr>
                                                            <th class="text-center"><b>IV</b></th>
                                                            <th colspan="2"><b>Kualitas Produk</b></th>
                                                            <th class="text-center" colspan="2">
                                                                <b>{{ $kualitas->sum('nilai') }}</b>
                                                            </th>
                                                            <th rowspan="{{ $kualitas->count() + 1 }}"></th>
                                                        </tr>
                                                        @foreach ($kualitas as $item)
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td>{{ $item->kualitas }}</td>
                                                                <td class="text-center">{{ $item->nilai }}</td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        @endforeach
                                                        {{-- Kualitas Produk End --}}

                                                        <tr>
                                                            <th class="text-center" rowspan="5"></th>
                                                            <th class="text-center" colspan="4"> <span
                                                                    class="symbol-e">∑</span><i>Total
                                                                    Nilai</i> </th>
                                                            <th rowspan="5" class="text-center"><b>
                                                                    {{ $tulisan->sum('nilai') + $presentasi->sum('nilai') + $penguasaan->sum('nilai') + $kualitas->sum('nilai') }}</b>
                                                            </th>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover mb-5">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2"
                                                                class="text-center font-weight-bold text-dark">No</th>
                                                            <th rowspan="2"
                                                                class="text-center font-weight-bold text-dark">MATERI
                                                                PENELITIAN</th>
                                                            <th rowspan="2"
                                                                class="text-center font-weight-bold text-dark">Seminar
                                                                (SM)</th>
                                                            <th colspan="2"
                                                                class="text-center font-weight-bold text-dark">Sidang
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center font-weight-bold text-dark">Pembimbing
                                                                (PB)</th>
                                                            <th class="text-center font-weight-bold text-dark">Penguji (PG)
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>Tulisan</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>Presentasi</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td>Penguasaan Materi</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">4</td>
                                                            <td>Kualitas Produk</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" rowspan="2" style="height: 40px"></td>
                                                            <td rowspan="2"></td>
                                                            <td rowspan="2"></td>
                                                            <td rowspan="2"></td>
                                                        </tr>
                                                        <tr>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="text-center">Total</td>
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" rowspan="4" class="text-center">Huruf
                                                                Mutu : A, B,
                                                                C,
                                                                Gagal </td>
                                                            <td>TOTAL ≥ 80</td>
                                                            <td colspan="2" rowspan="4">Huruf Mutu :</td>
                                                        </tr>
                                                        <tr>
                                                            <td>70 ≤ TOTAL < 79</td>
                                                        </tr>
                                                        <tr>
                                                            <td>50 ≤ TOTAL < 69</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL ≤ 49</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a role="button" href="#collapse3" data-toggle="collapse" data-target="#collapse3"
                                aria-expanded="false" aria-controls="collapse3" class="text-decoration-none text-dark">
                                <div class="card shadow-smooth custom-card mb-2">
                                    <div class="card-header" id="heading1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <strong>Berkas Ujian Seminar</strong>
                                            <i class="fe fe-plus fe-16 text-dark"></i>
                                        </div>
                                    </div>
                                    <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                        data-parent="#accordion1">
                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                            wolf
                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda
                                            shoreditch et. </div>
                                    </div>
                                </div>
                            </a>
                            <a role="button" href="#collapse4" data-toggle="collapse" data-target="#collapse4"
                                aria-expanded="false" aria-controls="collapse4" class="text-decoration-none text-dark">
                                <div class="card shadow-smooth custom-card mb-2">
                                    <div class="card-header" id="heading1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <strong>Kartu Bimbingan</strong>
                                            <i class="fe fe-plus fe-16 text-dark"></i>
                                        </div>
                                    </div>
                                    <div id="collapse4" class="collapse" aria-labelledby="heading3"
                                        data-parent="#accordion1">
                                        <div class="card-body">
                                            <div class="card shadow-smooth custom-card mb-2 kartu mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center"><b>KARTU BIMBINGAN<br>
                                                            SEMESTER GANJIL. TAHUN AKADEMIK 2023/2024</b>
                                                    </h5>
                                                    <table>
                                                        <tr>
                                                            <td>NIM</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>:</td>
                                                            <td>{{ get_app_info('nim') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NAMA</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>:</td>
                                                            <td>{{ get_app_info('nama') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>JUDUL SKRIPSI</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>:</td>
                                                            <td>{{ get_app_info('judul_skripsi') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PERUBAHAN JUDUL SKRIPSI</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>:</td>
                                                            <td>{{ get_app_info('perubahan_judul_skripsi') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- section --}}
                                            <form action="{{ route('asistensi.update') }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="toolbar row mb-3">
                                                    <div class="col ml-auto">
                                                        <div class="dropdown float-right">
                                                            <button class="btn btn-primary float-right ml-3"
                                                                type="submit">Simpan
                                                            </button>
                                                            <button class="btn btn-primary float-right ml-3"
                                                                type="button" data-toggle="modal"
                                                                data-target="#createModalAsistensi"
                                                                data-whatever="@mdo">Tambah +</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- table -->
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover mb-0">
                                                        <thead>
                                                            <tr role="row">
                                                                <th colspan="4"
                                                                    class="text-center font-weight-bold text-dark">
                                                                    KEGIATAN
                                                                    ASISTENSI PEMBIMBING 1
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center font-weight-bold text-dark">
                                                                    PERTEMUAN
                                                                    KE-</th>
                                                                <th class="text-center font-weight-bold text-dark">MATERI
                                                                    PEMBAHASAN
                                                                </th>
                                                                <th class="text-center font-weight-bold text-dark">BAB</th>
                                                                <th class="text-center font-weight-bold text-dark">PARAF
                                                                    PEMBIMBING
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($asistensi as $item)
                                                                <tr>
                                                                    <td class="text-center">{{ $item->pertemuan }}</td>
                                                                    <td>{{ $item->materi }}</td>
                                                                    <td class="text-center">{{ $item->bab }}</td>
                                                                    <td class="text-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="hidden"
                                                                                name="materi[{{ $item->id }}][id]"
                                                                                value="{{ $item->id }}">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                name="materi[{{ $item->id }}][paraf]"
                                                                                id="asisCheck{{ $item->id }}"
                                                                                value="1"
                                                                                {{ $item->paraf ? 'checked' : '' }}>
                                                                            <label class="custom-control-label"
                                                                                for="asisCheck{{ $item->id }}"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a role="button" href="#collapse5" data-toggle="collapse" data-target="#collapse5"
                                aria-expanded="false" aria-controls="collapse5" class="text-decoration-none text-dark">
                                <div class="card shadow-smooth custom-card mb-2">
                                    <div class="card-header" id="heading1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <strong>Form Penilaian Sidang</strong>
                                            <i class="fe fe-plus fe-16 text-dark"></i>
                                        </div>
                                    </div>
                                    <div id="collapse5" class="collapse" aria-labelledby="heading3"
                                        data-parent="#accordion1">
                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                            wolf
                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda
                                            shoreditch et. </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div>
        </div>
    </div>
    @include('pages.berkas.persyaratan.create')
    @include('pages.berkas.perbaikan.create')
    @include('pages.berkas.asistensi.create')
    @include('pages.berkas.kartu.edit')
@endsection
