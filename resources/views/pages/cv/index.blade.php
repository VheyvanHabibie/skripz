@extends('layouts.template')
<style>
    .step {
        margin-bottom: 20px;
    }

    #cvPreview {
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #f9f9f9;
    }
</style>

@section('content')
    <div class="container-fluid">
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
        <div class="row mb-5">
            <div class="col-md-6">
                <!-- Step 1: Data Pribadi -->
                @include('pages.cv.partials.personal')
                <!-- Step 2: Pengalaman -->
                @include('pages.cv.partials.experience')
                <!-- Step 3: Pendidikan -->
                @include('pages.cv.partials.education')
                <!-- Step Organisasi -->
                @include('pages.cv.partials.organization')
            </div>

            <div class="col-md-6">
                {{-- <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img id="previewImage" src="" alt="Pratinjau Foto" style="display: none;"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <h4 class="text-dark" id="previewName"></h4>
                                <div class="d-flex flex-wrap mb-2">
                                    <small id="previewPhone" class="small mr-2"></small>
                                    <small id="previewEmail" class="small mr-2"></small>
                                    <small id="previewUrlLinkedin" class="small mr-2"></small>
                                    <small id="previewUrlPortofolio" class="small mr-2"></small>
                                    <small id="previewAddress" class="small"></small>
                                </div>
                                <p id="previewDescription" class="small text-dark"></p>
                            </div>
                        </div>
                        <p class="border-bottom border-dark h5">Pengalaman Pekerjaan</p>
                        <div class="d-flex justify-content-between">
                            <small><span id="previewNamaPerusahaan" class="text-dark font-weight-bold mr-2"></span><span
                                    id="previewLokasiPerusahaan" class="text-muted font-weight-bold"> </span></small>
                            <small class="text-dark font-weight-bold">Jul 2024 - Jan 2030</small>
                        </div>
                        <small class="small text-dark font-weight-bold"><i id="previewJabatan"></i></small>
                        <p class="small text-muted" id="previewDeskripsiPerusahaan"></p>
                        <div id="previewPortofolioKerja" class="small text-dark">

                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <small><span class="text-dark font-weight-bold">PT. Malific</span><span
                                    class="text-muted font-weight-bold"> - Bandung</span></small>
                            <small class="text-dark font-weight-bold">Jul 2024 - Jan 2030</small>
                        </div>
                        <small class="small text-dark font-weight-bold" id=""><i>Mobile Developer</i></small>
                        <p class="small text-muted" id="">Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Inventore ipsum placeat sit cumque quaerat rerum.</p>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <p class="border-bottom border-dark h5 mt-3">Pendidikan</p>
                        <div class="d-flex justify-content-between">
                            <small><span class="text-dark font-weight-bold">Universitas Bandung</span><span
                                    class="text-muted font-weight-bold"> - Bandung</span></small>
                            <small class="text-dark font-weight-bold">Jul 2024 - Jan 2030</small>
                        </div>
                        <p class="small text-muted" id="">Diploma, Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Corporis, atque., 2.40/4.00, </p>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <p class="border-bottom border-dark h5 mt-3">Organisasi</p>
                        <div class="d-flex justify-content-between">
                            <small><span class="text-dark font-weight-bold">Osis</span><span
                                    class="text-muted font-weight-bold"> - Bandung</span></small>
                            <small class="text-dark font-weight-bold">Jul 2024 - Jan 2030</small>
                        </div>
                        <small class="small text-dark font-weight-bold" id=""><i>Ketua Osis</i></small>
                        <p class="small text-muted" id="">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Error earum sapiente non eius, eos cupiditate. Dolores tempore nisi quas et. </p>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <p class="border-bottom border-dark h5 mt-3">Keterampilan, Prestasi & Pengalaman Lainnya</p>
                        <small class="text-dark font-weight-bold">Project (2030)</small>
                    </div>
                </div> --}}
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset($dataPersonal->foto ?? 0) }}" alt="Pratinjau Foto" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <h4 class="text-dark">{{ $dataPersonal->nama_lengkap ?? '' }}</h4>
                                <div class="d-flex flex-wrap mb-2">
                                    <small class="small mr-2">{{ $dataPersonal->no_telpon ?? '' }}</small>
                                    <small class="small mr-2">{{ $dataPersonal->email ?? '' }}</small>
                                    <small class="small mr-2">{{ $dataPersonal->url_linkedin ?? '' }}</small>
                                    <small class="small mr-2">{{ $dataPersonal->url_portofolio ?? '' }}</small>
                                    <small class="small">{{ $dataPersonal->alamat ?? '' }}</small>
                                </div>
                                <p class="small text-dark">{{ $dataPersonal->deskripsi_singkat ?? '' }}</p>
                            </div>
                        </div>
                        <p class="border-bottom border-dark h5">Pengalaman Pekerjaan</p>
                        @foreach ($dataExperiences as $item)
                            <div class="d-flex justify-content-between">
                                <small><span
                                        class="text-dark font-weight-bold mr-2">{{ $item->nama_perusahaan ?? '' }}</span><span
                                        class="text-muted font-weight-bold">{{ $item->lokasi_perusahaan ?? '' }}</span></small>
                                <small class="text-dark font-weight-bold">{{ $item->bulan_mulai_experience ?? '' }}
                                    {{ $item->tahun_mulai_experience ?? '' }} -
                                    {{ $item->bulan_selesai_experience ?? '' }}
                                    {{ $item->tahun_selesai_experience ?? '' }}</small>
                            </div>
                            <small class="small text-dark font-weight-bold"><i>{{ $item->jabatan ?? '' }}</i></small>
                            <p class="small text-muted">{{ $item->deskripsi_perusahaan ?? '' }}</p>
                            <div class="small text-dark">
                                {!! $item->portofolio_kerja !!}
                            </div>
                            <br>
                        @endforeach
                        <p class="border-bottom border-dark h5 mt-3">Pendidikan</p>
                        @foreach ($dataEducations as $item)
                            <div class="d-flex justify-content-between">
                                <small><span class="text-dark font-weight-bold">{{ $item->nama_sekolah }}</span><span
                                        class="text-muted font-weight-bold"> -
                                        {{ $item->lokasi_education }}</span></small>
                                <small class="text-dark font-weight-bold">{{ $item->bulan_mulai_education }}
                                    {{ $item->tahun_mulai_education }} - {{ $item->bulan_selesai_education }}
                                    {{ $item->tahun_selesai_education }}</small>
                            </div>
                            <p class="small text-muted">{{ $item->jenjang_sekolah }},
                                {{ $item->deskripsi_education }}, {{ $item->ipk }}/{{ $item->ipk_max }}, </p>
                            <div class="small text-dark">
                                {!! $item->pencapaian !!}
                            </div>
                        @endforeach
                        <p class="border-bottom border-dark h5 mt-3">Organisasi</p>
                        <div class="d-flex justify-content-between">
                            <small><span class="text-dark font-weight-bold">Osis</span><span
                                    class="text-muted font-weight-bold"> - Bandung</span></small>
                            <small class="text-dark font-weight-bold">Jul 2024 - Jan 2030</small>
                        </div>
                        <small class="small text-dark font-weight-bold" id=""><i>Ketua Osis</i></small>
                        <p class="small text-muted" id="">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Error earum sapiente non eius, eos cupiditate. Dolores tempore nisi quas et. </p>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <li class="small text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                        <p class="border-bottom border-dark h5 mt-3">Keterampilan, Prestasi & Pengalaman Lainnya</p>
                        <small class="text-dark font-weight-bold">Project (2030)</small>
                    </div>
                </div> --}}
                <div id="result-cv"></div>
            </div>
        </div>
        {{-- </form> --}}

    </div>
    <script>
        let currentStep = 1;

        function showStep(step) {
            // Sembunyikan semua step
            document.querySelectorAll('.step').forEach((el) => el.style.display = 'none');
            // Tampilkan step yang sesuai
            document.getElementById(`step${step}`).style.display = 'block';
        }

        function nextStep() {
            currentStep++;
            showStep(currentStep);
        }

        function prevStep() {
            currentStep--;
            showStep(currentStep);
        }

        // Inisialisasi step pertama saat halaman dimuat
        showStep(currentStep);

        // function updatePreview() {
        //     // Preview for Personal Information (you can keep this as is)
        //     document.getElementById('previewName').innerText = document.querySelector('input[name="nama_lengkap"]').value ||
        //         "";
        //     document.getElementById('previewEmail').innerText = document.querySelector('input[name="email"]').value || "";
        //     document.getElementById('previewPhone').innerText = document.querySelector('input[name="no_telpon"]').value ||
        //         "";
        //     document.getElementById('previewUrlLinkedin').innerText = document.querySelector('input[name="url_linkedin"]')
        //         .value || "";
        //     document.getElementById('previewUrlPortofolio').innerText = document.querySelector(
        //         'input[name="url_portofolio"]').value || "";
        //     document.getElementById('previewDescription').innerText = document.querySelector(
        //         'textarea[name="deskripsi_singkat"]').value || "";
        //     document.getElementById('previewAddress').innerText = document.querySelector('textarea[name="alamat"]').value ||
        //         "";

        //     document.getElementById('previewNamaPerusahaan').innerText = document.querySelector(
        //         'input[name="nama_perusahaan[]"]').value || "";
        //     document.getElementById('previewJabatan').innerText = document.querySelector('input[name="jabatan[]"]').value ||
        //         "";
        //     document.getElementById('previewLokasiPerusahaan').innerText = document.querySelector(
        //         'input[name="lokasi_perusahaan[]"]').value || "";
        //     document.getElementById('previewDeskripsiPerusahaan').innerText = document.querySelector(
        //         'textarea[name="deskripsi_perusahaan[]"]').value || "";
        //     document.getElementById('previewPortofolioKerja').innerHTML = document.querySelector(
        //         'textarea[name="portofolio_kerja[]"]').value || "";
        //     document.getElementById('previewBulanMulai').innerText = document.querySelector(
        //         'select[name="bulan_mulai_experience[]"]').value || "";;
        //     document.getElementById('previewTahunMulai').innerText = document.querySelector(
        //         'select[name="tahun_mulai_experience[]"]').value || "";
        //     document.getElementById('previewBulanSelesai').innerText = document.querySelector(
        //         'select[name="bulan_selesai_experience[]"]').value || "";;
        //     document.getElementById('previewTahunSelesai').innerText = document.querySelector(
        //         'select[name="tahun_selesai_experience[]"]').value || "";

        //     // Handle image preview (if applicable)
        //     const fileInput = document.querySelector('input[name="foto"]');
        //     const previewImage = document.getElementById('previewImage');
        //     if (fileInput && fileInput.files && fileInput.files[0]) {
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             previewImage.src = e.target.result;
        //             previewImage.style.display = 'block';
        //         };
        //         reader.readAsDataURL(fileInput.files[0]);
        //     } else {
        //         previewImage.style.display = 'none'; // Hide image if no file is selected
        //     }
        // }
        document.addEventListener('DOMContentLoaded', function() {
            var quill1 = new Quill('#editor-konten-1', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'], // Formatting options
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });
            var quill2 = new Quill('#editor-konten-2', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'], // Formatting options
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });
            var quill3 = new Quill('#editor-desc-org', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'], // Formatting options
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });
            quill1.format('list', 'bullet');
            quill2.format('list', 'bullet');
            quill3.format('list', 'bullet');

            function saveQuillData() {
                document.getElementById('konten1').value = quill1.root.innerHTML;
            }

            function saveQuillDataPendidikan() {
                document.getElementById('konten2').value = quill2.root.innerHTML;
            }

            function saveQuillDataOrganisasi() {
                document.getElementById('desc-org').value = quill3.root.innerHTML;
            }

            function submitForm() {
                saveQuillData();
                const form = $('#formDataPekerjaan');
                const formData = new FormData(form[0]);
                let url = '{{ route('dataexperience.store') }}';
                let method = 'POST';

                const dataPribadiId = document.getElementById('data_experience_id')?.value;
                if (dataPribadiId) {
                    url = `{{ route('dataexperience.update', ':id') }}`.replace(':id',
                        dataPribadiId);
                    method = 'PUT';
                }
                $.ajax({
                    url: url, // Ganti dengan endpoint server
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Data berhasil tersimpan!"
                        });
                        nextStep();
                        $('#personal_id_1').val(response.id)
                        console.log(response.id);

                    },
                    error: function(xhr) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Terjadi kesalahan pada server."
                        });
                    }
                });
            }

            function submitFormPendidikan() {
                saveQuillDataPendidikan()
                const form = $('#formDataPendidikan');
                const formData = new FormData(form[0]);

                let url = '{{ route('dataeducation.store') }}';
                let method = 'POST';

                const dataPribadiId = document.getElementById('data_education_id')?.value;
                if (dataPribadiId) {
                    url = `{{ route('dataeducation.update', ':id') }}`.replace(':id',
                        dataPribadiId);
                    method = 'PUT';
                }

                $.ajax({
                    url: url, // Ganti dengan endpoint server
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Data berhasil tersimpan!"
                        });
                        nextStep();
                        $('#personal_id_2').val(response.id)
                    },
                    error: function(xhr) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Terjadi kesalahan pada server."
                        });
                    }
                });
            }
            function submitFormOrg() {
                saveQuillDataOrganisasi()
                const form = $('#formDataOrganisasi');
                const formData = new FormData(form[0]);

                let url = '{{ route('dataorg.store') }}';
                let method = 'POST';

                const dataPribadiId = document.getElementById('data_org_id')?.value;
                if (dataPribadiId) {
                    url = `{{ route('dataorg.update', ':id') }}`.replace(':id',
                        dataPribadiId);
                    method = 'PUT';
                }

                $.ajax({
                    url: url, // Ganti dengan endpoint server
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Data berhasil tersimpan!"
                        });
                        $.ajax({
                            url: `/generate-cv`,
                            method: "GET",
                            success: function(response) {
                                if (response.status === 'success') {
                                    $('#result-cv').html(response
                                        .html); // Masukkan HTML ke dalam elemen
                                } else {
                                    alert('Gagal mengambil data CV.');
                                }
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText);
                                alert('Terjadi kesalahan.');
                            }
                        });
                    },
                    error: function(xhr) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Terjadi kesalahan pada server."
                        });
                    }
                });
            }
            document.getElementById('submitButton').addEventListener('click', submitForm);
            document.getElementById('submitButtonPendidikan').addEventListener('click', submitFormPendidikan);
            document.getElementById('submitButtonOrg').addEventListener('click', submitFormOrg);
        });

        function saveData() {
            const formData = new FormData(document.getElementById('formDataPribadi'));
            // Tentukan URL yang akan digunakan untuk form create atau update
            let url; // Default URL untuk create (POST)
            let method; // Default method untuk create

            // Cek apakah form ini untuk edit (misalnya ada id dalam form)
            const dataPribadiId = document.getElementById('data_pribadi_id')?.value;
            console.log(dataPribadiId);

            if (dataPribadiId) {
                url = `/cv/data-personal/${dataPribadiId}`; // Update URL untuk edit (PUT/PATCH)
                method = 'POST'; // Menggunakan PUT untuk update
            } else {
                url = '/cv/data-personal'; // Default URL untuk create (POST)
                method = 'POST'; // Default method untuk create
            }
            // Kirim data via AJAX
            fetch(url, {
                    method: method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        // Tampilkan pesan sukses
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Data berhasil tersimpan!"
                        });
                        // Lanjutkan ke step berikutnya
                        nextStep();
                        $('#personal_id').val(result.id)
                    } else {
                        // Tampilkan error jika ada
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "warning",
                            title: "Terjadi kesalahan saat menyimpan data."
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "Terjadi kesalahan pada server."
                    });
                });
        }

        let experienceCount = 1;

        function addExperience() {
            experienceCount++;

            const accordionContainer = document.getElementById("accordion1");
            const newAccordion = document.createElement("div");
            newAccordion.classList.add("card", "shadow", "mb-3");

            newAccordion.innerHTML = `
        <a role="button" href="#collapse${experienceCount}" data-toggle="collapse" data-target="#collapse${experienceCount}"
            aria-expanded="true" aria-controls="collapse${experienceCount}" class="text-dark text-decoration-none">
            <div class="card-header" id="heading${experienceCount}">
                <div class="d-flex align-items-center justify-content-between">
                    <strong>Pengalaman Kerja ${experienceCount}</strong>
                    <i class="fe fe-plus fe-16"></i>
                </div>
            </div>
        </a>
        <div id="collapse${experienceCount}" class="collapse" aria-labelledby="heading${experienceCount}" data-parent="#accordion1">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_perusahaan${experienceCount}">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan[]" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="posisi${experienceCount}">Jabatan/Magang/Posisi</label>
                        <input type="text" name="posisi[]" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lokasi_perusahaan${experienceCount}">Lokasi Perusahaan(Kota, Negara)</label>
                    <input type="text" name="lokasi_perusahaan[]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="deskripsi${experienceCount}">Deskripsi perusahaan(Opsional)</label>
                    <textarea name="deskripsi[]" rows="6" class="form-control"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Mulai (Bulan)</label>
                        <select name="start_month[]" class="form-control" required>
                            <option value="">Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Mulai (Tahun)</label>
                        <select name="start_year[]" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Selesai (Bulan)</label>
                        <select name="end_month[]" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Selesai (Tahun)</label>
                        <select name="end_year[]" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="currentJob${experienceCount}">
                        <label class="custom-control-label font-weight-bold" for="currentJob${experienceCount}">Tempat Bekerja Saat Ini</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="portfolio${experienceCount}">Portofolio Kerja dan Prestasi</label>
                    <textarea name="portfolio[]" rows="6" class="form-control"></textarea>
                </div>
            </div>
        </div>
    `;

            accordionContainer.appendChild(newAccordion);
        }
        let educationCount = 1;

        function addEducation() {
            educationCount++;

            const accordionContainer = document.getElementById("accordion-edu");
            const newAccordion = document.createElement("div");
            newAccordion.classList.add("card", "shadow", "mb-3");

            newAccordion.innerHTML = `
        <a role="button" href="#collapse${educationCount}" data-toggle="collapse" data-target="#collapse${educationCount}"
            aria-expanded="true" aria-controls="collapse${educationCount}" class="text-dark text-decoration-none">
            <div class="card-header" id="heading${educationCount}">
                <div class="d-flex align-items-center justify-content-between">
                    <strong>Riwayat Pendidikan ${educationCount}</strong>
                    <i class="fe fe-plus fe-16"></i>
                </div>
            </div>
        </a>
        <div id="collapse${educationCount}" class="collapse" aria-labelledby="heading${educationCount}" data-parent="#accordion1">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_sekolah${educationCount}">Nama Sekolah/Universitas</label>
                    <input type="text" name="nama_sekolah[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lokasi_sekolah${educationCount}">Lokasi Sekolah/Universitas (Kota, Negara)</label>
                    <input type="text" name="lokasi_sekolah[]" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Mulai (Bulan)</label>
                        <select name="start_month[]" class="form-control" required>
                            <option value="">Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Mulai (Tahun)</label>
                        <select name="start_year[]" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Selesai (Bulan)</label>
                        <select name="end_month[]" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Selesai (Tahun)</label>
                        <select name="end_year[]" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tingkat Pendidikan</label>
                        <select name="education_level[]" class="form-control">
                            <option value="">Pilih Tingkat</option>
                            <option value="SMK">SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="deskripsi${educationCount}">Deskripsi</label>
                        <textarea name="deskripsi[]" rows="6" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ipk${educationCount}">IPK (Opsional namun direkomendasikan)</label>
                    <input type="number" step="0.01" name="ipk[]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ipk_max${educationCount}">IPK Maksimal</label>
                    <input type="number" step="0.01" name="ipk_max[]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pencapaian${educationCount}">Aktifitas dan Pencapaian</label>
                    <textarea name="pencapaian[]" rows="6" class="form-control"></textarea>
                </div>
            </div>
        </div>
    `;

            accordionContainer.appendChild(newAccordion);
        }
    </script>
@endsection
