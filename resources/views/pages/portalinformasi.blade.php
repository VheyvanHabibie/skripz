@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <h2 class="font-weight-bold pb-3">Lowongan Pekerjaan</h2>
        <form id="job-search-form" class="mb-3">
            <div class="d-flex">
                <input class="form-control form-control-lg mr-2 bg-white" name="search_key" id="search_key"
                    placeholder="Cari berdasarkan posisi pekerjaan atau lokasi">
                <button type="submit" class="btn btn-info px-5">
                    Cari
                </button>
            </div>
        </form>
        <center>
            <div class="spinner-border text-info my-3" id="loading-spinner" role="status" aria-hidden="true"
                style="display: none;">
                <span class="visually-hidden"></span>
            </div>
        </center>
        @if ($lowongan->count() > 0)
            <div class="row" id="search-results">
                @foreach ($lowongan as $item)
                    <div class="col-md-6">
                        <div class="card custom-card shadow-smooth mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $item->posisi_pekerjaan }}</h5>
                                <small class="text-muted">Berakhir:
                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->locale('id')->translatedFormat(' d F Y') }}</small>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->nama_perusahaan }}</h6>
                                <p class="text-dark">
                                    <i class="bi bi-geo-alt fe-14"></i> {{ $item->kabupaten->type }}
                                    {{ $item->kabupaten->name }}, {{ $item->provinsi->name }}
                                </p>
                                <p class="card-text">
                                    {{ Str::limit($item->deskripsi_pekerjaan, 200) }}
                                    <!-- Membatasi deskripsi hingga 200 karakter -->
                                </p>
                                <div class="mt-auto">
                                    <button class="btn  btn-outline-primary font-weight-bold btn-block" type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#DetailModal{{ $item->id }}">Detail</button>
                                    <button class="btn  btn-primary font-weight-bold btn-block" type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#LamarModal{{ $item->id }}">Lamar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="DetailModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title h5 font-weight-bold" id="exampleModalLabel">Detail Lowongan
                                        {{ $item->posisi_pekerjaan }}</h1>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-3 text-dark">Posisi Pekerjaan</dt>
                                        <dd class="col-sm-9 text-dark">{{ $item->posisi_pekerjaan }}.</dd>
                                        <dt class="col-sm-3 text-dark">Lokasi Pekerjaan</dt>
                                        <dd class="col-sm-9 text-dark">{{ $item->lokasi_pekerjaan }}.</dd>
                                        <dt class="col-sm-3 text-dark">Waktu Kerja</dt>
                                        <dd class="col-sm-9 text-dark">
                                            {{ date('H:i', strtotime($item->waktu_mulai)) }} -
                                            {{ date('H:i', strtotime($item->waktu_selesai)) }}.
                                        </dd>
                                        <dt class="col-sm-3 text-dark">Hari Kerja</dt>
                                        <dd class="col-sm-9 text-dark">{{ $item->hari_kerja_mulai }} -
                                            {{ $item->hari_kerja_selesai }}.</dd>
                                    </dl>
                                    <p class="font-weight-bold text-dark">Deskripsi Pekerjaan</p>
                                    <p class="text-dark">{{ $item->deskripsi_pekerjaan }}.</p>
                                    <p class="font-weight-bold text-dark">Persyaratan Pekerjaan</p>
                                    <p class="text-dark">{!! $item->persyaratan_pekerjaan !!}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="LamarModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title h5 font-weight-bold" id="exampleModalLabel">Form Lamaran
                                        Kerja
                                        {{ $item->posisi_pekerjaan }}</h1>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="form-apply-{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="lowongan_id" value="{{ $item->id }}">
                                    <input type="hidden" name="industri_id" value="{{ $item->industri_id }}">
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="nama_pelamar" class="form-label font-weight-bold">Nama
                                                Lengkap</label>
                                            <input type="text" class="form-control form-control-lg bg-white"
                                                placeholder="Masukan Nama Lengkap" name="nama_pelamar" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email_pelamar" class="form-label font-weight-bold">
                                                E-mail</label>
                                            <input type="text" class="form-control form-control-lg bg-white"
                                                placeholder="Masukan E-mail" name="email_pelamar" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alamat_pelamar" class="form-label font-weight-bold">Alamat</label>
                                            <textarea name="alamat_pelamar" id="" cols="30" rows="5"
                                                class="form-control form-control-lg bg-white" placeholder="Masukan Alamat" required></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="file_cv" class="col-form-label font-weight-bold">File
                                                CV</label>
                                            <p class="small text-danger">
                                                Format file (.pdf), Ukuran maksimal file : 2MB
                                            </p>
                                            <input type="file" name="file_cv" id="file_cv"
                                                class="form-file bg-white" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary"
                                            id="submit-button-{{ $item->id }}">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true" style="display: none;"></span>
                                            Kirim Lamaran
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row justify-content-center">
                <h4 class=" text-center text-dark font-weight-bold">Belum Ada Lowongan Pekerjaan Tersedia!</h4>
            </div>
        @endif
    </div>
    <script>
        document.getElementById('job-search-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const searchKey = document.getElementById('search_key').value;
            let caritButton = $('#submit-button-cari');
            let spinner = $('#loading-spinner');
            // Show spinner and disable the button
            caritButton.prop('disabled', true);
            spinner.show();
            var lowonganHtml = $('#search-results');

            // Send POST request using fetch
            fetch('/cari/lowongan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF Token for security
                    },
                    body: JSON.stringify({
                        search_key: searchKey
                    })
                })
                .then(response => response.json())
                .then(data => {

                    if (data.status === 'success' && data.data.length > 0) {
                        caritButton.prop('disabled', false);
                        spinner.hide();
                        lowonganHtml.html('');
                        // Append each job listing to the results
                        data.data.forEach(job => {
                            var jobElement = `
<div class="col-md-6 mb-5">
                            <div class="card custom-card shadow-smooth mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">${job.posisi_pekerjaan}</h5>
                                    <small class="text-muted">Berakhir: ${job.tanggal_berakhir}</small>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">${job.nama_perusahaan}</h6>
                                    <p class="text-dark">
                                        <i class="bi bi-geo-alt fe-14"></i> ${job.kabupaten.type} ${job.kabupaten.name}, ${job.provinsi.name}
                                    </p>
                                    <p class="card-text">${job.deskripsi_pekerjaan.substring(0, 200)}...</p>
                                    <div class="mt-auto">
                                        <button class="btn btn-outline-primary btn-block" type="button"
                                            data-bs-toggle="modal" data-bs-target="#DetailModal${job.id}">Detail</button>
                                        <button class="btn btn-primary btn-block" type="button"
                                            data-bs-toggle="modal" data-bs-target="#LamarModal${job.id}">Lamar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="DetailModal${job.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title h5 font-weight-bold">Detail Lowongan ${job.posisi_pekerjaan}</h1>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-3 text-dark">Posisi Pekerjaan</dt>
                                        <dd class="col-sm-9 text-dark">${job.posisi_pekerjaan}</dd>
                                        <dt class="col-sm-3 text-dark">Lokasi Pekerjaan</dt>
                                        <dd class="col-sm-9 text-dark">${job.lokasi_pekerjaan}</dd>
                                        <dt class="col-sm-3 text-dark">Waktu Kerja</dt>
                                        <dd class="col-sm-9 text-dark">${job.waktu_mulai} - ${job.waktu_selesai}</dd>
                                        <dt class="col-sm-3 text-dark">Hari Kerja</dt>
                                        <dd class="col-sm-9 text-dark">${job.hari_kerja_mulai} - ${job.hari_kerja_selesai}</dd>
                                    </dl>
                                    <p class="font-weight-bold text-dark">Deskripsi Pekerjaan</p>
                                    <p class="text-dark">${job.deskripsi_pekerjaan}</p>
                                    <p class="font-weight-bold text-dark">Persyaratan Pekerjaan</p>
                                    <p class="text-dark">${job.persyaratan_pekerjaan}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Lamar -->
                    <div class="modal fade" id="LamarModal${job.id}" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title h5 font-weight-bold">Form Lamaran Kerja ${job.posisi_pekerjaan}</h1>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="form-apply-${job.id}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="lowongan_id" value="${job.id}">
                                    <input type="hidden" name="industri_id" value="${job.industri_id}">
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="nama_pelamar" class="form-label font-weight-bold">Nama Lengkap</label>
                                            <input type="text" class="form-control form-control-lg bg-white" placeholder="Masukan Nama Lengkap" name="nama_pelamar" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email_pelamar" class="form-label font-weight-bold">E-mail</label>
                                            <input type="email" class="form-control form-control-lg bg-white" placeholder="Masukan E-mail" name="email_pelamar" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alamat_pelamar" class="form-label font-weight-bold">Alamat</label>
                                            <textarea name="alamat_pelamar" cols="30" rows="5" class="form-control form-control-lg bg-white" placeholder="Masukan Alamat" required></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="file_cv" class="col-form-label font-weight-bold">File CV</label>
                                            <p class="small text-danger">Format file (.pdf), Ukuran maksimal file: 2MB</p>
                                            <input type="file" name="file_cv" class="form-file bg-white" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary"
                                            id="submit-button-${job.id}">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true" style="display: none;"></span>
                                            Kirim Lamaran
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
                            lowonganHtml.append(jobElement);
                        });
                    } else {
                        caritButton.prop('disabled', false);
                        spinner.hide();
                        lowonganHtml.html(
                            '<div class="col-md-12"><p class="text-center h4 font-weight-bold">Tidak ada lowongan kerja yang ditemukan.</p></div>'
                        );
                    }
                })
                .catch(error => {
                    caritButton.prop('disabled', false);
                    spinner.hide();
                    console.error('Error:', error);
                    lowonganHtml.html(
                        '<div class="col-md-12"><p class="text-center h4 font-weight-bold">Terjadi kesalahan. Coba lagi nanti.</p></div>'
                    );
                });
        });

        $(document).on('submit', 'form[id^="form-apply-"]', function(event) {
            event.preventDefault();

            let formId = $(this).attr('id');
            let submitButton = $('#submit-button-' + formId.split('-').pop());
            let spinner = submitButton.find('.spinner-border');

            // Tampilkan spinner dan nonaktifkan button
            submitButton.prop('disabled', true);
            spinner.show();

            let formData = new FormData(this);

            $.ajax({
                url: '{{ route('lamaran.store') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function(response) {
                    let message = response.message;
                    $('#' + formId).trigger('reset');
                    $('#LamarModal' + response.id).modal('hide');

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: message,
                        showConfirmButton: false,
                        timer: 1500,
                        toast: true,
                    });

                    // Sembunyikan spinner dan aktifkan kembali button
                    submitButton.prop('disabled', false);
                    spinner.hide();
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        const errors = error.responseJSON.errors;
                        let errorMessage = '';

                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                            errorMessage += value[0] + '<br>';
                        });

                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            html: errorMessage,
                            showConfirmButton: false,
                            timer: 1500,
                            toast: true,
                        });
                    }

                    // Sembunyikan spinner dan aktifkan kembali button
                    submitButton.prop('disabled', false);
                    spinner.hide();
                }
            });
        });
    </script>
@endsection
