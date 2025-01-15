@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 my-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="toolbar row mb-3">
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <button class="btn btn-primary float-right ml-3" type="button"
                                                data-toggle="modal" data-target="#createModalPresentasi"
                                                data-whatever="@mdo">Tambah +</button>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-5 dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Presentasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($presentasi as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->presentasi }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#editModalPresentasi{{ $item->id }}"
                                                                    data-whatever="@mdo">Edit</a>
                                                                <a class="dropdown-item" href=""
                                                                    onclick="deleteActivity({{ $item->id }})">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div>
        </div>
    </div>
    @include('pages.berkas.presentasi.create')
    @include('pages.berkas.presentasi.edit')
    <script>
        function deleteActivity(itemId) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda Yakin ?',
                text: 'Data Akan Terhapus Permanen',
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
                        url: '{{ route('presentasi.destroy', 'id') }}'.replace("id", itemId),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire('Deleted!', 'Data has been deleted.', 'success').then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire('Failed!', 'Data failed to delete.', 'error');
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
