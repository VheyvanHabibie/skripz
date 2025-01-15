@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0 fw-bold fs-7">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('paket.store') }}" method="POST" id="form-konten-1">
                    @csrf
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Akademisi" {{ old('kategori') == 'Akademisi' ? 'selected' : '' }}>Akademisi
                            </option>
                            <option value="Industri" {{ old('kategori') == 'Industri' ? 'selected' : '' }}>Industri</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">Pilih Jenis</option>
                            <option value="Free" {{ old('jenis') == 'Free' ? 'selected' : '' }}>Free</option>
                            <option value="Basic" {{ old('jenis') == 'Basic' ? 'selected' : '' }}>Basic</option>
                            <option value="Pro" {{ old('jenis') == 'Pro' ? 'selected' : '' }}>Pro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" required
                            value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="konten1" class="form-control" cols="30" rows="10" hidden>{!! old('description') !!}</textarea>
                        <div id="editor-konten-1" style="min-height: 250px;" class="bg-white">{!! old('description') !!}</div>
                    </div>

                    <div class="form-group">
                        <label for="fitur">Fitur</label>
                        <textarea name="fitur" id="konten2" class="form-control" cols="30" rows="10" hidden>{!! old('fitur') !!}</textarea>
                        <div id="editor-konten-2" style="min-height: 250px;" class="bg-white">{!! old('fitur') !!}</div>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" required
                            value="{{ old('harga') }}">
                    </div>

                    <div class="form-group">
                        <label for="duration">Durasi</label>
                        <input type="text" name="duration" id="duration" class="form-control" required
                            value="{{ old('duration') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
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

            var quill2 = new Quill('#editor-konten-2', {
                modules: {
                    toolbar: quill1.options.modules.toolbar // Sama seperti toolbar editor 1
                },
                theme: 'snow'
            });

            var form1 = document.getElementById('form-konten-1');
            form1.addEventListener('submit', function() {
                document.getElementById('konten1').value = quill1.root.innerHTML;
                document.getElementById('konten2').value = quill2.root.innerHTML;
            });
        });
    </script>
@endsection
