@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('listekosistem.store') }}" method="POST" class="needs-validation" novalidate id="form-konten-1"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">Nama Ekosistem</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Deskripsi Ekositem</label>
                        <textarea name="content" id="konten1" class="form-control" cols="30" rows="10" hidden>{!! old('content') !!}</textarea>
                        <div id="editor-konten-1" style="min-height: 250px;" class="bg-white">{!! old('content') !!}</div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label">Gambar</label>
                        <p class="small text-danger">Maksimal Gambar: 2MB & Ukuran Gambar Harus 40x40 </p>
                        <input type="file" class="form-control-file form-custom" name="image" accept="image/*"
                            required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn mb-2 btn-primary">Simpan</button>
                    </div>
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
