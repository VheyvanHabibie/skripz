<div class="section-tentang">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh" id="tentang">
        <div class="row align-items-center" style="overflow: hidden">
            <div class="col-md-6 mb-5" data-aos="fade-right" style="padding: 0;">
                <img src="{{ asset('assets/images/vector-aboutus.png') }}" alt="" class="img-fluid" style="display: block; margin: 0;">
            </div>
                <div class="col-md-6 text-white p-4" data-aos="fade-left" style="background-color: #365486; border-radius: 10px;">
                    <!-- Ikon Tiga Titik -->
                    <div class="d-flex justify-content-start mb-3">
                        <div class="dot me-2" style="width: 15px; height: 15px; border-radius: 50%;  background-color: #FFFFFF;"></div>
                        <div class="dot me-2" style="width: 15px; height: 15px; border-radius: 50%;  background-color: #93B5C6;"></div>
                        <div class="dot" style="width: 15px; height: 15px; border-radius: 50%;  background-color: #7FC7D9;"></div>
                    </div>

                    <h1 class="display-5 fw-bold mb-4" style="color: #FFFFFF;">{{ $tentang->title }}</h1>
                    <p class="h5" style="color: #FFFFFF;">{!! $tentang->subtitle !!}</p>

                    <div class="h5 mt-3" style="color: #FFFFFF;">
                        <p>{!! $tentang->description !!}</p>
                    </div>

                    <div class="h5 mt-3" style="color: #FFFFFF;">
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2-circle text-light me-2" style="font-size: 2rem;"></i>
                                <span>{!! $tentang->pointone !!}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2-circle text-light me-2" style="font-size: 2rem;"></i>
                            <span>{!! $tentang->pointtwo !!}</span>
                            </li>
                            <li class="d-flex align-items-center">  
                                <i class="bi bi-check2-circle text-light me-2" style="font-size: 2rem;"></i>
                            <span>{!! $tentang->pointthree !!}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
