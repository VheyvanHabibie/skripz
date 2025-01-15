<div class="section bg-gradient-tentang">
    <div style="border-bottom : 1px solid #001688">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/skripzz.png') }}" alt="Logo" width="50px" class="me-2">
                        <img src="{{ asset('assets/images/SkripZ.png') }}" alt="Logo" class="mb-3">
                    </div>                    
                    <h6 class="mb-3 fw-medium" style="color: #001688">{{ setting('alamat') }}</h6>
                    {{-- <h6 class="mb-3 fw-medium" style="color: #001688">Komplek Pesona Ciganitri Blok A No. 39</h6> --}}
                    <div class="d-flex align-items-start mb-2" style="color: #001688">
                        <i class="bi bi-whatsapp fs-5"></i>
                        <span class="ms-2 fw-medium pt-1">{{ setting('no_telepon') }}</span>
                        {{-- <span class="ms-2 fw-medium pt-1" style="color: #001688">0815-4686-5286</span> --}}
                    </div>
                    <div class="d-flex align-items-start mb-2" style="color: #001688">
                        <i class="bi bi-envelope-fill fs-5" style="color: #001688"></i>
                        <span class="ms-2 fw-medium pt-1">{{ setting('email') }}</span>
                        {{-- <span class="ms-2 fw-medium pt-1" style="color: #001688">makerdotindo@gmail.com</span> --}}
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <img src="{{ asset('assets/images/footer.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-2 pb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="fw-medium" style="color: #001688">Copyright &copy; {{ setting('tahun') }} {{ setting('copyright') }}.</h6>
            <div class="row">
                <div class="col-auto">
                    <a href="{{ setting('url_instagram') }}" target="_blank">
                        <span class="bi bi-instagram fs-3" style="color: #001688"></span>
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{ setting('url_youtube') }}" target="_blank">
                        <span class="bi bi-youtube fs-3" style="color: #001688"></span>
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{ setting('url_linkedin') }}" target="_blank">
                        <span class="bi bi-linkedin fs-3" style="color: #001688"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
