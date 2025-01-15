@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-auto text-center">
                <h1 class="display-2 m-0 font-weight-bolder text-muted">403</h1>
                <h2 class="mb-1 text-muted font-weight-bold">OOPS!</h2>
                <h6 class="mb-3 text-muted">Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</h6>
                <a href="{{ route('dashboard') }}" class="btn btn-block btn-primary px-5">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
@endsection

