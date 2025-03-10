@extends('layouts.template')

@section('content')
    <div class="container">
        <h3 class="mb-4">Hasil Penilaian Sidang</h3>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Dosen Penguji</th>
                                <th>Total Nilai</th>
                                <th>Rata Rata Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $sidang->first()->mahasiswa->name }}</td>
                                <td>{{ $sidang->first()->mahasiswa->nim }}</td>
                                <td>
                                    @foreach ($sidang->first()->pengujis as $penguji)
                                        <li>{{ $penguji->dosen->nama_dosen }}</li>
                                    @endforeach
                                </td>
                                <td>{{ $totalNilai }}</td>
                                <td>{{ number_format($rataNilai, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
