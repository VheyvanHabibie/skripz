@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                {{-- Error Validation --}}
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
                        <button class="btn mb-0 btn-primary float-right mb-3" type="button" data-toggle="modal"
                            data-target="#createModal" data-whatever="@mdo">
                            Tambah <span class="fe fe-plus fe-15"></span>
                        </button>
                        <a class="btn mb-0 btn-info mb-3 mr-2" type="button"
                            href="{{ asset('assets/file/Template_Form_Data_Mahasiswa.xlsx') }}" download>
                            Unduh Template <span class="fe fe-download fe-15"></span>
                        </a>
                        <button class="btn mb-0 btn-success float-right mb-3 mr-2" type="button" data-toggle="modal"
                            data-target="#importModal" data-whatever="@mdo">
                            Import <span class="fe fe-plus fe-15"></span>
                        </button>
                        <div class="table-responsive">
                            <table class="table dataTables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lorem</th>
                                        <th>Ipsum Siamrt</th>
                                        <th>Dolor simplit</th>
                                        <th>Audotitor</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
