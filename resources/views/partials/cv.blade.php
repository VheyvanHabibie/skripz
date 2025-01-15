<div class="card">
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
                <small><span class="text-dark font-weight-bold mr-2">{{ $item->nama_perusahaan ?? '' }}</span><span
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
        @foreach ($dataOrganization as $item)

        <div class="d-flex justify-content-between">
            <small><span class="text-dark font-weight-bold">{{ $item->nama_organisasi }}</span><span class="text-muted font-weight-bold"> -
                {{ $item->lokasi_organisasi }}</span></small>
                <small class="text-dark font-weight-bold">{{ $item->bulan_mulai_organisasi }}
                    {{ $item->tahun_mulai_organisasi }} - {{ $item->bulan_selesai_organisasi }}
                    {{ $item->tahun_selesai_organisasi }}</small>
        </div>
        <small class="small text-dark font-weight-bold" id=""><i>{{ $item->posisi }}</i></small>
        <p class="small text-muted" id="">{{ $item->deskripsi_organisasi }}</p>
        <div class="small text-dark">
            {!! $item->deskripsi_pekerjaan !!}
        </div>
        @endforeach
        <p class="border-bottom border-dark h5 mt-3">Keterampilan, Prestasi & Pengalaman Lainnya</p>
        <small class="text-dark font-weight-bold">Project (2030)</small>
    </div>
</div>
