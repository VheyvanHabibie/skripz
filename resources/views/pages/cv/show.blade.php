<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile CV</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .cv-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #000000;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-top: 1rem;
        }

        .personal-info,
        .education-section,
        .experience-section {
            margin-bottom: 1.5rem;
        }

        .education-card,
        .experience-card {
            background-color: #f0f8f0;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .education-card h3,
        .experience-card h3 {
            margin: 0;
            color: #000000;
        }

        a {
            color: #000000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="cv-container">
        <!-- Data Pribadi -->
        <section class="personal-info">
            <center>
                @if ($dataPersonal->foto)
                    <img src="{{ asset($dataPersonal->foto) }}" alt="Foto" class="profile-photo">
                @endif
                <h1>{{ $dataPersonal->nama_lengkap }}</h1>
                <p>{{ $dataPersonal->no_telpon }} | {{ $dataPersonal->email }} | <a href="{{ $dataPersonal->url_linkedin }}">{{ $dataPersonal->url_linkedin }}</a> | <a href="{{ $dataPersonal->url_portofolio }}">{{ $dataPersonal->url_portofolio }}</a></p>
                <p>Alamat: {{ $dataPersonal->alamat }}</p>
            </center>
            <p>Deskripsi: {{ $dataPersonal->deskripsi_singkat }}</p>
        </section>

        <!-- Data Pendidikan -->
        <section class="education-section">
            <h2>Pendidikan</h2>
            @foreach ($dataEducation as $education)
                <div class="education-card">
                    <h3>{{ $education->nama_sekolah }}</h3>
                    <p>Lokasi: {{ $education->lokasi_perusahaan }}</p>
                    <p>Jenjang: {{ $education->jenjang_sekolah }}</p>
                    <p>IPK: {{ $education->ipk }} / {{ $education->ipk_max }}</p>
                    <p>Durasi: {{ $education->bulan_mulai_education }} {{ $education->tahun_mulai_education }} -
                        {{ $education->bulan_selesai_education }} {{ $education->tahun_selesai_education }}</p>
                    <p>Pencapaian: {{ $education->pencapaian }}</p>
                    <p>Sertifikat: <a href="{{ $education->link_sertifikat }}">{{ $education->link_sertifikat }}</a>
                    </p>
                    <p>Deskripsi: {{ $education->deskripsi_perusahaan }}</p>
                </div>
            @endforeach
        </section>

        <!-- Data Pengalaman Kerja -->
        <section class="experience-section">
            <h2>Pengalaman Kerja</h2>
            @foreach ($dataExperience as $experience)
                <div class="experience-card">
                    <h3>{{ $experience->nama_perusahaan }}</h3>
                    <p>Jabatan: {{ $experience->jabatan }}</p>
                    <p>Lokasi: {{ $experience->lokasi_perusahaan }}</p>
                    <p>Durasi: {{ $experience->bulan_mulai_experience }} {{ $experience->tahun_mulai_experience }} -
                        {{ $experience->bulan_selesai_experience }} {{ $experience->tahun_selesai_experience }}</p>
                    <p>Deskripsi: {{ $experience->deskripsi_perusahaan }}</p>
                    <p>Portofolio Kerja: {{ $experience->portofolio_kerja }}</p>
                </div>
            @endforeach
        </section>
    </div>
</body>

</html>
