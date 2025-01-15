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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('management.index') }}">Management Akun</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Management Role</li>
                    </ol>
                </nav>


                <div class="row">
                    <div class="col-md-12">
                        <a class="btn mb-0 btn-primary float-right mb-3" type="button"
                            href="{{ route('management-role.create') }}">
                            Tambah <span class="fe fe-plus fe-15"></span>
                        </a>
                    </div>
                </div>

                {{-- Card Container (2 Cards per Row) --}}
                <div class="row">
                    @foreach ($roles as $role)
                        <div class="col-md-12 mb-4">
                            <div class="card shadow-smooth custom-card">
                                <div class="card-header h4"><strong>Role : {{ $role->name }}</strong></div>
                                <div class="card-body p-5">
                                    <div id="accordion">
                                        <div class="row">
                                            @foreach ($permissions as $groupName => $groupPermissions)
                                                <div class="col-md-3 mb-3">
                                                    <div class="card shadow-smooth custom-card">
                                                        <a class="btn btn-link text-decoration-none text-dark font-weight-bold"
                                                            data-toggle="collapse"
                                                            data-target="#collapse{{ $loop->index }}" aria-expanded="false"
                                                            aria-controls="collapse{{ $loop->index }}">
                                                            <div class="card-header text-start" style="border: none"
                                                                id="heading{{ $loop->index }}">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">
                                                                        {{ ucwords($groupName) }}
                                                                    </h6>
                                                                    <i class="fe bi-chevron-down fe-16 text-dark"></i>
                                                                </div>

                                                            </div>
                                                        </a>

                                                        <div id="collapse{{ $loop->index }}" class="collapse"
                                                            aria-labelledby="heading{{ $loop->index }}">
                                                            <div class="card-body">
                                                                <ul class="list-unstyled">
                                                                    @foreach ($groupPermissions as $permission)
                                                                        @if ($role->permissions->contains($permission))
                                                                            <li>{{ ucwords($permission->name) }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer ">
                                    <form action="{{ route('management-role.destroy', $role->id) }}" method="POST"
                                        id="Hapus{{ $role->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger float-right" type="submit" id="Hapus"
                                            onclick="deleteActivity({{ $role->id }})">
                                            <i class="fe fe-trash fe-12"></i> Hapus
                                        </button>
                                        <a class="btn btn-outline-primary mr-2 float-right" type="button"
                                            href="{{ route('management-role.edit', $role->id) }}">
                                            <i class="fe fe-edit fe-12"></i> Edit
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- End Card Container --}}
            </div>
        </div>
    </div>
@endsection
