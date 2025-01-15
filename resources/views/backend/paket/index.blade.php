@extends('layouts.template')

@section('content')
    <div class="container-fluid">
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
        <div class="card">
            <div class="card-body">
                <button id="delete-all" class="btn btn-danger float-right mb-2">Hapus Semua</button>
                <a class="btn btn-primary float-right mb-2 mr-2" href="{{ route('paket.create') }}">Tambah</a>
                <div class="table-responsive">
                    <table class="table datatables dataTable" id="dataTable-1">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th class="text-dark font-weight-bold">#</th>
                                <th class="text-dark font-weight-bold">Kategori</th>
                                <th class="text-dark font-weight-bold">Jenis</th>
                                <th class="text-dark font-weight-bold">Title</th>
                                <th class="text-dark font-weight-bold">Price</th>
                                <th class="text-dark font-weight-bold">Duration</th>
                                <th class="text-center text-dark font-weight-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $item)
                                <tr>
                                    <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->duration }}</td>
                                    <td class="text-center">
                                        <form id="deleteForm{{ $item->id }}">
                                            <a type="button" href="{{ route('paket.edit', $item->id) }}"
                                                class="btn btn-outline-primary btn-sm"><i class="fe fe-edit fe-16"></i></a>
                                            <a type="button" class="btn btn-outline-warning btn-sm"
                                                href="{{ route('paket.show', $item->id) }}"><i
                                                    class="fe fe-eye fe-16"></i></a>
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="deletePaket({{ $item->id }})" type="button"><i
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
        function deletePaket(itemId) {
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
                        url: '{{ route('paket.destroy', ':id') }}'.replace(":id", itemId),
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
                                Swal.fire('Gagal!', 'Paket Gagal Dihapus!.');
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
                        url: '{{ route('paket.deleteAll') }}',
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
                                Swal.fire('Gagal!', 'Paket Gagal Dihapus!.');

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
