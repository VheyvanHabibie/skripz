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
        <div class="card mb-5">
            <div class="card-body">
                <h6 class="mb-3">Konten Layanan</h6>

                <!-- Form untuk store atau update -->
                <form action="{{ $layanan ? route('layanan.update', $layanan->id) : route('layanan.store') }}" method="POST"
                    id="form-konten-1" enctype="multipart/form-data">
                    @csrf
                    @if ($layanan)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $layanan->title ?? old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea name="content" id="konten1" class="form-control" cols="30" rows="10" hidden>{!! $layanan->content ?? old('content') !!}</textarea>
                        <div id="editor-konten-1" style="min-height: 250px;" class="bg-white">{!! $layanan->content ?? old('content') !!}</div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $layanan ? 'Update' : 'Simpan' }}</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="mb-5">List Layanan</h6>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary float-right mb-2 mr-2" href="{{ route('layanan.create') }}">Tambah</a>
            </div>
        </div>
        @if ($listlayanan->count() > 0)
        <div class="row">
            @foreach ($listlayanan as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset($item->image ?? 'assets/img/no-image.png') }}" alt="" class="img-fluid">
                            <h4>{{ $item->title }}</h4>
                            <div class="text-dark">
                                {!! $item->content !!}
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
                                            <a class="dropdown-item" href="{{ route('layanan.edit', $item->id) }}"><i class="fe fe-edit fe-12 mr-4"></i>Edit</a>
                                            <a class="dropdown-item" href="./detail.html"><i
                                                    class="fe fe-eye fe-12 mr-4"></i>Detail</a>
                                            <form id="deleteForm{{ $item->id }}">
                                                <button class="dropdown-item"
                                                    onclick="deleteListLayanan({{ $item->id }})" type="button"><i
                                                        class="fe fe-delete fe-12 mr-4"></i>Hapus</button>
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
            <h4 class="text-center font-weight-bold">Belum Ada List Layanan</h4>
        @endif

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Quill untuk setiap editor
            var quill1 = new Quill('#editor-konten-1', {
                modules: {
                    toolbar: [
                        [{
                            'font': []
                        }],
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'direction': 'rtl'
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image', 'video'],
                        ['clean'],
                        ['emoji']
                    ]
                },
                theme: 'snow'
            });

            var form1 = document.getElementById('form-konten-1');
            form1.addEventListener('submit', function() {
                document.getElementById('konten1').value = quill1.root.innerHTML;
            });
        });
    </script>
    <script>
        function deleteListLayanan(itemId) {
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
                        url: '{{ route('listlayanan.destroy', ':id') }}'.replace(":id", itemId),
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
