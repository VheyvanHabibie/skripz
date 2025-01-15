@extends('layouts.template')

@section('content')
    <div class="container-fluid">
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
                <form action="{{ route('repository-skripsi.store') }}" method="POST" id="form-repo">
                    @csrf
                    <div class="form-group">
                        <label for="judul" class="required">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="required">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="links">Links (Youtube, Github, Google Drive)</label>
                        <textarea name="links" id="konten1" class="form-control" cols="30" rows="10" hidden></textarea>
                        <div id="editor-konten-1" style="min-height: 250px;" class="bg-white"></div>
                    </div>
                    <a type="button" href="{{ route('repository-skripsi.index') }}" class="btn mb-2 btn-danger" >Kembali</a>
                    <button type="submit" class="btn mb-2 btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill1 = new Quill('#editor-konten-1', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'], // Formatting options
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link'],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });

            quill1.format('list', 'bullet');

            var form = document.getElementById('form-repo');
            form.addEventListener('submit', function(e) {
                var konten1 = document.getElementById('konten1');
                konten1.value = quill1.root.innerHTML;
            });
        });
    </script>
@endsection
