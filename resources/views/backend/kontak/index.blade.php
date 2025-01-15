@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <button id="delete-all" class="btn btn-danger mb-2">Hapus Semua</button>
                <div class="table-responsive">
                    <table class="table datatables dataTable" id="dataTable-1">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th class="text-dark font-weight-bold">#</th>
                                <th class="text-dark font-weight-bold">Nama Pengirim</th>
                                <th class="text-dark font-weight-bold">Email Pengirim</th>
                                <th class="text-dark font-weight-bold">Pesan</th>
                                <th class="text-center text-dark font-weight-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontak as $item)
                                <tr>
                                    <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pengirim }}</td>
                                    <td>{{ $item->email_pengirim }}</td>
                                    <td>{{ Str::limit($item->pesan_pengirim, 150) }}</td>
                                    <td class="text-center">
                                        <form id="deleteForm{{ $item->id }}">
                                            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#showModal{{ $item->id }}" data-whatever="@mdo"><i
                                                class="fe fe-eye fe-16"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="deleteKontak({{ $item->id }})" type="button"><i
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
    @include('backend.kontak.show')
    <script>
        function deleteKontak(itemId) {
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
                        url: '{{ route('kontak.destroy', ':id') }}'.replace(":id", itemId),
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
                                Swal.fire('Gagal!', 'Kontak Gagal Dihapus!.');
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
                        url: '{{ route('kontak.deleteAll') }}',
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
                                Swal.fire('Gagal!', 'Kontak Gagal Dihapus!.');

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
