@extends('layouts.template')

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Hasil Penilaian Sidang</h3>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Mahasiswa</th>
                            <th class="text-center">Total Nilai</th>
                            <th class="text-center">Rata-rata Nilai</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sidangs as $key => $sidang)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $sidang->mahasiswa->name }}</td>
                                <td class="text-center">{{ $sidang->total_nilai }}</td>
                                <td class="text-center">{{ number_format($sidang->rata_nilai, 2) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('sidang.hasil', $sidang->mahasiswa_id) }}" class="btn btn-info btn-sm">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
