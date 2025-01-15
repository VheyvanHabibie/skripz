@extends('layouts.template')
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1rem;
    }

    .col-span-1 {
        grid-column: span 1 / span 1;
    }

    .mb-3 {
        margin-bottom: 0.75rem;
    }

    .form-check-input {
        margin-right: 0.25rem;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('management.index') }} ">Management</a></li>
                        <li class="breadcrumb-item"><a href=" {{ route('management-role.index') }} ">Management Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Management Role</li>
                    </ol>
                </nav>
                <div class="card shadow-smooth custom-card">
                    <form action="{{ route('management-role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="required">Nama Role</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nama Role" value="{{ $role->name }}" required>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" id="permissioncheckall" value="all" class="custom-control-input">
                                <label class="custom-control-label" for="permissioncheckall">
                                    <h6>Pilih semua</h6>
                                </label>
                            </div>

                            <div class="grid grid-cols-4 gap-4">
                                @foreach ($permissions as $group => $row)
                                    <div class="custom-control custom-checkbox">
                                        <h6>{{ ucwords($group) }}</h6>
                                        @foreach ($row as $permission)
                                            <div>
                                                <input type="checkbox" class="custom-control-input form-input"
                                                    id="permission-{{ $permission->id }}" name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="permission-{{ $permission->id }}">
                                                    {{ ucwords($permission->name) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>


                            <div class="float-right">
                                <button type="submit" class="btn mb-2 btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let checked = false;
            document.getElementById('permissioncheckall').addEventListener('change', function() {
                let checkboxes = document.querySelectorAll('.form-input');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = !checked;
                });
                checked = !checked;
            });
        });
    </script>
@endsection
