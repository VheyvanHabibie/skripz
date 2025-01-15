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
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=" {{ route('datautama.index') }} ">Data Utama</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Perguruan Tinggi</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <div class="card shadow-smooth custom-card">
                            <div class="card-body">
                                {{-- @can('akses tambah-jabatan') --}}
                                <button class="btn btn-primary float-right mb-3" type="button" data-toggle="modal"
                                    data-target="#createModal" data-whatever="@mdo">
                                    Tambah <span class="fe fe-plus fe-15"></span>
                                </button>
                                {{-- @endcan --}}
                                <div class="table-responsive">
                                    <table class="table dataTables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th class="text-start">No</th>
                                                <th class="text-start">Nama Perguruan Tinggi</th>
                                                <th class="text-start">Lokasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perguruan_tinggi as $item)
                                                <tr>
                                                    <td class="text-start">{{ $loop->iteration }}</td>
                                                    <td class="text-start">{{ $item->nama_perguruan_tinggi }}</td>
                                                    <td class="text-start"> {{ $item->kabupaten->type }}
                                                        {{ $item->kabupaten->name }}, {{ $item->provinsi->name }}</td>
                                                    <td>
                                                        <form action="{{ route('perguruan-tinggi.destroy', $item->id) }}"
                                                            method="POST" id="Hapus{{ $item->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            {{-- @can('akses hapus-jabatan') --}}
                                                            <button class="btn btn-outline-danger" id="Hapus"
                                                                onclick="deleteActivity({{ $item->id }})"><i
                                                                    class="fe fe-trash fe-12"></i></button>
                                                            {{-- @endcan --}}
                                                            {{-- @can('akses edit-jabatan') --}}
                                                            <button class="btn btn-outline-primary" data-toggle="modal"
                                                                data-target="#editModal{{ $item->id }}"
                                                                data-whatever="@mdo" type="button"><i
                                                                    class="fe fe-edit-3 fe-12 "></i></button>
                                                            {{-- @endcan --}}
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.datamaster.perguruan-tinggi.create')
    @include('pages.datamaster.perguruan-tinggi.edit')
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat Kabupaten berdasarkan Provinsi
            function loadKabupaten(provinsiId, kabupatenDropdown, selectedKabupatenId = null) {
                kabupatenDropdown.empty().append('<option value="">-- Pilih Kabupaten / Kota --</option>');
                if (provinsiId) {
                    $.get(`/get-kabupaten/${provinsiId}`, function(data) {
                        data.forEach(item => {
                            kabupatenDropdown.append(
                                `<option value="${item.id}" ${selectedKabupatenId == item.id ? 'selected' : ''}>${item.type} ${item.name}</option>`
                            );
                        });
                        kabupatenDropdown.prop('disabled', false).prop('required', true);
                    });
                } else {
                    kabupatenDropdown.prop('disabled', true).prop('required', false);
                }
            }

            // Skrip untuk elemen dropdown global (jika ada dropdown dengan ID tetap)
            $('#provinsi').change(function() {
                const provinsiId = $(this).val();
                const kabupatenDropdown = $('#kabupaten');
                kabupatenDropdown.empty().append('<option value="">-- Pilih Kabupaten / Kota --</option>');

                if (provinsiId) {
                    kabupatenDropdown.prop('disabled', false).prop('required', true);
                    $.get(`/get-kabupaten/${provinsiId}`, function(data) {
                        data.forEach(kabupaten => {
                            kabupatenDropdown.append(
                                `<option value="${kabupaten.id}">${kabupaten.type} ${kabupaten.name}</option>`
                            );
                        });
                    });
                } else {
                    kabupatenDropdown.prop('disabled', true).prop('required', false);
                }
            });

            // Skrip untuk dropdown dinamis berdasarkan data Perguruan Tinggi
            @foreach ($perguruan_tinggi as $item)
                (function(itemId, provinsiIdValue, kabupatenIdValue) {
                    const provinsiDropdown = $(`#provinsi_${itemId}`);
                    const kabupatenDropdown = $(`#kabupaten_${itemId}`);

                    // Inisialisasi data saat halaman dimuat
                    loadKabupaten(provinsiIdValue, kabupatenDropdown, kabupatenIdValue);

                    // Event listener untuk perubahan Provinsi
                    provinsiDropdown.change(function() {
                        const newProvinsiId = $(this).val();
                        loadKabupaten(newProvinsiId, kabupatenDropdown);
                    });

                    // Tambahkan atribut required pada provinsi dan kabupaten
                    provinsiDropdown.prop('required', true);
                    kabupatenDropdown.prop('required', true);
                })(
                    "{{ $item->id }}",
                    "{{ $item->provinsi_id }}",
                    "{{ $item->kabupaten_id }}"
                );
            @endforeach
        });
    </script>
@endsection
