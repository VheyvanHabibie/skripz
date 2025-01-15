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
                <form action="{{ route('repository-skripsi.update', $repo->id) }}" method="POST" id="form2-repo">
                    @csrf
                    @method('patch')
                        <div class="form-group">
                            <label for="judul" class="required">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ $repo->judul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="required">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10" required>{{ $repo->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="links">Links (Youtube, Github, Google Drive)</label>
                            <textarea name="links" id="konten2" class="form-control" cols="30" rows="10" hidden>{!! $repo->links !!}</textarea>
                            <div id="editor-konten-2" style="min-height: 250px;" class="bg-white">{!! $repo->links !!}</div>
                        </div>
                        <a type="button" class="btn mb-2 btn-danger" href="{{ route('repository-skripsi.index') }}">Batal</a>
                        <button type="submit" class="btn mb-2 btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill2 = new Quill('#editor-konten-2', {
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

            quill2.format('list', 'bullet');

            var form2 = document.getElementById('form2-repo');
            form2.addEventListener('submit', function(e) {
                var konten2 = document.getElementById('konten2');
                konten2.value = quill2.root.innerHTML;
            });
        });
    </script>
@endsection
