@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-auto text-center">
                <h1 class="display-2 m-0 font-weight-bolder text-muted">419</h1>
                <h2 class="mb-1 text-muted font-weight-bold">OOPS!</h2>
                <h6 class="mb-3 text-muted">Terlalu Banyak Permintaan.</h6>
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-block px-5">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
@endsection

