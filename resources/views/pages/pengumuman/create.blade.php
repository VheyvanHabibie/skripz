@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Buat Pengumuman</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pengumuman.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul Pengumuman</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Isi Pengumuman</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pengumuman</button>
    </form>
</div>
@endsection
