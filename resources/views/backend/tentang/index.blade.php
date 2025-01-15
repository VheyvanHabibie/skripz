@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <h4 class="mb-5">Tentang</h4>

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
                <!-- Form untuk store atau update -->
                <form action="{{ $tentang ? route('tentang.update', $tentang->id) : route('tentang.store') }}" method="POST"
                    id="form-konten-1" enctype="multipart/form-data">
                    @csrf
                    @if ($tentang)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $tentang->title ?? old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Sub Judul</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                            value="{{ $tentang->subtitle ?? old('subtitle') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Konten</label>
                        <textarea name="description" id="konten1" class="form-control" cols="30" rows="10" hidden>{!! $tentang->description ?? old('description') !!}</textarea>
                        <div id="editor-konten-1" style="min-height: 250px;" class="bg-white">{!! $tentang->description ?? old('description') !!}</div>
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        @if ($tentang && $tentang->image)
                            <div>
                                <img src="{{ asset($tentang->image) }}" alt="Gambar tentang" width="200">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $tentang ? 'Update' : 'Simpan' }}</button>
                </form>
            </div>
        </div>
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
@endsection
