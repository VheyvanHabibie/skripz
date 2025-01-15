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
                <h5>{{ $repo->judul }}</h5>
                <p>{{ $repo->deskripsi }}</p>
                <p class="text-dark font-weight-bold">Links (Youtube, Github, Google Drive) :</p>
                <div>{!! $repo->links !!}</div>
            </div>
        </div>
    </div>
@endsection
