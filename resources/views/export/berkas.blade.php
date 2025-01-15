<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Berkas</title>
    <style>
        body {
            font-family: Helvetica, sans-serif;
            margin: 0;
            color: #0d1a2b;
            font-size: .75em;
        }
    </style>
</head>

<body>
    <div class="table-reponsive">
        <table class="table" border="1" width="100%" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">No</th>
                    <th style="font-size: 0.6rem" colspan="2" class="text-center font-weight-bold text-dark">Aspek yang
                        di nilai</th>
                    <th style="font-size: 0.6rem" colspan="2" class="text-center font-weight-bold text-dark">Nilai</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">Total Nilai</th>
                </tr>
            </thead>
            <tbody>

                {{-- Tulisan Start --}}
                <tr>
                    <th style="font-size: 0.6rem" class="text-center"><b>I</b></th>
                    <th style="font-size: 0.6rem" colspan="2"><b>Tulisan</b></th>
                    <th style="font-size: 0.6rem" class="text-center" colspan="2"><b>{{ $tulisan->sum('nilai') }}</b>
                    </th>
                    <th style="font-size: 0.6rem" rowspan="{{ $tulisan->count() + 1 }}"></th>
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
                    <th style="font-size: 0.6rem" class="text-center"><b>II</b></th>
                    <th style="font-size: 0.6rem" colspan="2"><b>Presentasi</b></th>
                    <th style="font-size: 0.6rem" class="text-center" colspan="2">
                        <b>{{ $presentasi->sum('nilai') }}</b>
                    </th>
                    <th style="font-size: 0.6rem" rowspan="{{ $presentasi->count() + 1 }}"></th>
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
                    <th style="font-size: 0.6rem" class="text-center"><b>III</b></th>
                    <th style="font-size: 0.6rem" colspan="2"><b>Penguasaan Materi</b></th>
                    <th style="font-size: 0.6rem" class="text-center" colspan="2">
                        <b>{{ $penguasaan->sum('nilai') }}</b>
                    </th>
                    <th style="font-size: 0.6rem" rowspan="{{ $penguasaan->count() + 1 }}"></th>
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
                    <th style="font-size: 0.6rem" class="text-center"><b>IV</b></th>
                    <th style="font-size: 0.6rem" colspan="2"><b>Kualitas Produk</b></th>
                    <th style="font-size: 0.6rem" class="text-center" colspan="2"><b>{{ $kualitas->sum('nilai') }}</b>
                    </th>
                    <th style="font-size: 0.6rem" rowspan="{{ $kualitas->count() + 1 }}"></th>
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
                    <th style="font-size: 0.6rem" class="text-center" rowspan="5"></th>
                    <th style="font-size: 0.6rem" class="text-center" colspan="4"> <span class="symbol-e">∑</span><i>Total
                            Nilai</i> </th>
                    <th style="font-size: 0.6rem" rowspan="5" class="text-center"><b>
                            {{ $tulisan->sum('nilai') + $presentasi->sum('nilai') + $penguasaan->sum('nilai') + $kualitas->sum('nilai') }}</b>
                    </th>
                </tr>

            </tbody>
        </table>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table" border="1" width="100%" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th style="font-size: 0.6rem" rowspan="2" class="text-center font-weight-bold text-dark">No</th>
                    <th style="font-size: 0.6rem" rowspan="2" class="text-center font-weight-bold text-dark">MATERI
                        PENELITIAN</th>
                    <th style="font-size: 0.6rem" rowspan="2" class="text-center font-weight-bold text-dark">Seminar
                        (SM)</th>
                    <th style="font-size: 0.6rem" colspan="2" class="text-center font-weight-bold text-dark">Sidang
                    </th>
                </tr>
                <tr>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">Pembimbing (PB)</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">Penguji (PG)</th>
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
                    <td colspan="2" rowspan="4" class="text-center">Huruf Mutu : A, B, C,
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
    <br>
    <div class="table-responsive" style="page-break-before: always;">
        <table class="table" class="table" border="1" width="100%" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">No</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">BAB</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">HAL YANG HARUS
                        DIPERBAIKI</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">SELESAI *)</th>
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
                                <input type="hidden" name="perbaikan[{{ $item->id }}][id]"
                                    value="{{ $item->id }}">
                                <input type="checkbox" class="custom-control-input"
                                    name="perbaikan[{{ $item->id }}][selesai]" id="customCheck{{ $item->id }}"
                                    value="1" {{ $item->selesai ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck{{ $item->id }}"></label>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table" class="table" border="1" width="100%" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">No</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">Persyaratan</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">Cek list (diisi oleh
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
                                <input type="hidden" name="persyaratan[{{ $item->id }}][id]"
                                    value="{{ $item->id }}">
                                <input type="checkbox" class="custom-control-input"
                                    name="persyaratan[{{ $item->id }}][status]"
                                    id="persyaratanCheck{{ $item->id }}" value="1"
                                    {{ $item->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="persyaratanCheck{{ $item->id }}"></label>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <center>
        <h4 style="page-break-before: always;"><b>KARTU BIMBINGAN<br>
                SEMESTER GANJIL. TAHUN AKADEMIK 2023/2024</b>
        </h4>
    </center>
    <div class="table-responsive">
        <table>
            <tr>
                <td style="font-size: 0.6rem;">NIM</td>
                <td style="font-size: 0.6rem;">:</td>
                <td style="font-size: 0.6rem;">{{ get_app_info('nim') }}</td>
            </tr>
            <tr>
                <td style="font-size: 0.6rem;">NAMA</td>
                <td style="font-size: 0.6rem;">:</td>
                <td style="font-size: 0.6rem;">{{ get_app_info('nama') }}</td>
            </tr>
            <tr>
                <td style="font-size: 0.6rem;">JUDUL SKRIPSI</td>
                <td style="font-size: 0.6rem;">:</td>
                <td style="font-size: 0.6rem;">{{ get_app_info('judul_skripsi') }}</td>
            </tr>
            <tr>
                <td style="font-size: 0.6rem;">PERUBAHAN JUDUL SKRIPSI</td>
                <td style="font-size: 0.6rem;">:</td>
                <td style="font-size: 0.6rem;">{{ get_app_info('perubahan_judul_skripsi') }}</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table" class="table" border="1" width="100%" cellspacing="0" cellpadding="3">
            <thead>
                <tr role="row">
                    <th style="font-size: 0.6rem" colspan="4" class="text-center font-weight-bold text-dark">
                        KEGIATAN
                        ASISTENSI PEMBIMBING 1
                    </th>
                </tr>
                <tr>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">PERTEMUAN KE-</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">MATERI PEMBAHASAN
                    </th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">BAB</th>
                    <th style="font-size: 0.6rem" class="text-center font-weight-bold text-dark">PARAF PEMBIMBING
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
                                <input type="hidden" name="materi[{{ $item->id }}][id]"
                                    value="{{ $item->id }}">
                                <input type="checkbox" class="custom-control-input"
                                    name="materi[{{ $item->id }}][paraf]" id="asisCheck{{ $item->id }}"
                                    value="1" {{ $item->paraf ? 'checked' : '' }}>
                                <label class="custom-control-label" for="asisCheck{{ $item->id }}"></label>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
