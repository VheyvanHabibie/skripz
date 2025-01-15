@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <x-error-validation-message errors="$errors" />

        {{-- Alert Message --}}
        @if (session()->has('success'))
            <div class="row">
                <div class="col-md-12">
                    <x-success-message action="{{ session()->get('success') }}" />
                </div>
            </div>
        @endif
        <div class="card shadow-smooth custom-card">
            <div class="card-body">
                <a href="{{ route('lowongan.create') }}" class="btn btn-primary mb-3 float-right">Tambah</a>
                <div class="table-responsive">
                    <table class="table datatables dataTable" id="dataTable-1">
                        <thead>
                            <tr>
                                <th class="text-dark font-weight-bold">#</th>
                                <th class="text-dark font-weight-bold">Nama Perusahaan</th>
                                <th class="text-dark font-weight-bold">Posisi Pekerjaan</th>
                                <th class="text-dark font-weight-bold">Lokasi Pekerjaan</th>
                                <th class="text-dark font-weight-bold">Hari Kerja</th>
                                <th class="text-dark font-weight-bold">Jam Kerja</th>
                                <th class="text-dark font-weight-bold">Tanggal Berakhir</th>
                                <th class="text-center text-dark font-weight-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lowongan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_perusahaan }}</td>
                                    <td>{{ $item->posisi_pekerjaan }}</td>
                                    <td>{{ $item->kabupaten->type }} {{ $item->kabupaten->name }}, {{ $item->provinsi->name }}</td>
                                    <td>{{ $item->hari_kerja_mulai }} - {{ $item->hari_kerja_selesai }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}</td>
                                    <td>{{ $item->tanggal_berakhir }}</td>
                                    <td class="text-center">
                                        <form id="deleteForm{{ $item->id }}">
                                            <a type="button" class="btn btn-outline-warning btn-sm"
                                                href="{{ route('lowongan.show', $item->id) }}"><i
                                                    class="fe fe-eye fe-16"></i></a>
                                            <a type="button" class="btn btn-outline-primary btn-sm"
                                                href="{{ route('lowongan.edit', $item->id) }}"><i
                                                    class="fe fe-edit fe-16"></i></a>
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="deleteActivity({{ $item->id }})" type="button"><i
                                                    class="fe fe-trash fe-16"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteActivity(itemId) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Data Akan Dihapus Secara Permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a746',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('lowongan.destroy', ':id') }}'.replace(":id", itemId),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    toast: true,
                                });
                                location.reload();
                            } else {
                                Swal.fire('Gagal!', 'Lowongan Gagal Dihapus!.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                }
            });
        }
    </script>
@endsection
