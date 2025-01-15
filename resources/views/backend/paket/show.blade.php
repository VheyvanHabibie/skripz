@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ $paket->kategori }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" value="{{ $paket->title }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="konten1" class="form-control" cols="30" rows="10" hidden>{!! old('description', $paket->description) !!}</textarea>
                    <div id="editor-konten-1" style="min-height: 250px;" >{!! old('description', $paket->description) !!}</div>
                </div>

                <div class="form-group">
                    <label for="fitur">Fitur</label>
                    <textarea name="fitur" id="konten2" class="form-control" cols="30" rows="10" hidden>{!! old('fitur', $paket->fitur) !!}</textarea>
                    <div id="editor-konten-2" style="min-height: 250px;" >{!! old('fitur', $paket->fitur) !!}</div>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ number_format($paket->harga, 0, ',', '.') }}" disabled>
                </div>
                <div class="form-group">
                    <label for="duration">Durasi</label>
                    <input type="text" name="duration" id="duration" value="{{ $paket->duration }}" class="form-control"
                        disabled>
                </div>
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
                theme: 'snow',
                readOnly: 'true',
            });

            var quill2 = new Quill('#editor-konten-2', {
                modules: {
                    toolbar: quill1.options.modules.toolbar // Sama seperti toolbar editor 1
                },
                theme: 'snow',
                readOnly: 'true',
            });
        });
    </script>
@endsection
