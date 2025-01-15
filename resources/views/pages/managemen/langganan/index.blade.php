@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
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
                <div class="card shadow-smooth custom-card">
                    <div class="card-body">
                        <button id="delete-all" class="btn btn-danger mb-3">Hapus Semua</button>
                        <div class="table-responsive">
                            <table class="table dataTables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all"></th>
                                        <th>#</th>
                                        <th class="text-left">Order ID</th>
                                        <th class="text-left">Nama Pengguna</th>
                                        <th class="text-left">Alamat Email</th>
                                        <th>Kategori Akun</th>
                                        <th>Jenis Akun</th>
                                        <th>Jumlah Akun</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($langganan as $item)
                                        <tr>
                                            <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                            <td class="text-dark">{{ $loop->iteration }}</td>
                                            <td class="text-dark text-left">{{ $item->serial_number }}</td>
                                            <td class="text-dark text-left">{{ $item->user->name }}</td>
                                            <td class="text-dark text-left">{{ $item->user->email }}</td>
                                            <td class="text-dark">{{ $item->paket->kategori }}</td>
                                            <td class="text-dark">{{ $item->paket->jenis }}</td>
                                            <td class="text-dark">{{ $item->jumlah }}</td>
                                            <td class="text-dark">Rp {{ number_format($item->total_harga) }}</td>
                                            <td class="text-dark">
                                                {{ \Carbon\Carbon::parse($item->user->account_expires_at)->locale('id')->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-dark">Aktif</td>
                                            <td class="text-dark">
                                                <form action="{{ route('manajemenlangganan.destroy', $item->id) }}"
                                                    method="POST" id="Hapus{{ $item->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{-- @can('akses edit-bidang-keahlian') --}}
                                                    {{-- <button class="btn btn-outline-primary" data-toggle="modal"
                                                        data-target="#editModal{{ $item->id }}" data-whatever="@mdo"
                                                        type="button"><i class="fe fe-edit-3 fe-12"></i></button> --}}
                                                    {{-- @endcan --}}
                                                    {{-- @can('akses hapus-bidang-keahlian') --}}
                                                    <button class="btn btn-outline-danger" id="Hapus"
                                                        onclick="deleteActivityP({{ $item->id }})"><i
                                                            class="fe fe-trash fe-12"></i></button>
                                                    {{-- @endcan --}}
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
        </div>
    </div>
    <script>
        function deleteActivityP(itemId) {
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
                        url: '{{ route('manajemenlangganan.destroy', ':id') }}'.replace(":id", itemId),
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
                                Swal.fire('Gagal!', 'Langganan Gagal Dihapus!.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                }
            });
        }
        $('#select-all').on('change', function() {
            let isChecked = $(this).prop('checked');
            $('.select-item').prop('checked', isChecked);
        });
        $('#delete-all').on('click', function() {
            let ids = $('.select-item:checked').map(function() {
                return $(this).val();
            }).get();

            if (ids.length === 0) {
                Swal.fire({
                    title: 'Tidak ada yang dipilih',
                    text: 'Pilih untuk hapus.',
                    icon: 'warning'
                });
                return;
            }
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
                        url: '{{ route('manajemenlangganan.deleteAll') }}',
                        type: 'POST',
                        data: {
                            ids: ids,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
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
                                Swal.fire('Gagal!', 'Langganan Gagal Dihapus!.');

                            }
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting items.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endsection
