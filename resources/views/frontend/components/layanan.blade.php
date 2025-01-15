<div class="section beranda">
    <div class="container pt-5 pb-5" style="min-height: 140vh" id="layanan">
        <h1 class="display-5 fw-bold mb-4 text-center" style="color: #001688" data-aos="fade-up">Layanan Kami</h1>
        <div class="row mb-5">
            @foreach ($listlayanan as $item)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card shadow-sm h-100" style="background-color: transparent; border-color:#001688; border-width: 2px; color:#001688">
                        <div class="card-body align-items-center justify-content-center p-5">
                            <p class="text-center">{!! $item->icon !!}</p>
                            <p class="text-center" style="font-size: 1.5rem">{!! $item->content !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h1 class="display-5 fw-bold mb-5 text-center" style="color: #001688" data-aos="fade-up">Klien Kami</h1>
        <div class="owl-carousel owl-theme" id="klien-carousel">
            @foreach ($klien as $item)
                <div class="item">
                    <img src="{{ asset($item->logo ?? 'assets/img/no-image.png') }}" class="img-fluid" alt="">
                </div>
            @endforeach
        </div>
    </div>
</div>
