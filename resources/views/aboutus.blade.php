@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-header text-center"><strong>Tentang Kami</strong></div>
                            <div class="card-body">
                                {{ $about ? $about->deskripsi : '' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
