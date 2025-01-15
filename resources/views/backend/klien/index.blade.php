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
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary float-right mb-2 mr-2" data-toggle="modal" data-target="#createModal"
                    data-whatever="@mdo">Tambah</button>
            </div>
        </div>
        @if ($klien->count() > 0)
            <div class="row">
                @foreach ($klien as $item)
                    <div class="col-md-3">
                        <div class="card shadow mb-4 h-100">
                            <div class="card-body text-center">
                                <div class="avatar avatar-xl mt-2 mb-3">
                                    <img src="{{ asset($item->logo) }}" alt="..." class="avatar-img">
                                </div>
                                <div class="card-text mb-2">
                                    <strong class="card-title my-0">{{ $item->nama_klien }}</strong>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <div class="file-action">
                                            <button type="button"
                                                class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu m-2">
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editModal{{ $item->id }}" data-whatever="@mdo"
                                                    type="button"><i class="fe fe-edit fe-12 mr-4"></i>Edit</button>
                                                <form id="deleteForm{{ $item->id }}">
                                                    {{-- <a class="dropdown-item" href="./detail.html"><i
                                                        class="fe fe-eye fe-12 mr-4"></i>Detail</a> --}}
                                                    <button class="dropdown-item" onclick="deleteKlien({{ $item->id }})"
                                                        type="button"><i class="fe fe-delete fe-12 mr-4"></i>Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <h4 class="text-center font-weight-bold">Belum Ada Data Klien</h4>
        @endif
    </div>
    @include('backend.klien.create')
    @include('backend.klien.edit')
    <script>
        function deleteKlien(itemId) {
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
                        url: '{{ route('klien.destroy', ':id') }}'.replace(":id", itemId),
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
    </script>
@endsection
