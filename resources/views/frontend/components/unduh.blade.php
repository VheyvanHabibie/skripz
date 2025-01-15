<div class="section bg-unduh">
    <div class="container pt-5 pb-5 d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh">
        <div class="row align-items-center">
            <div class="col-md-5 mb-5 text-end" data-aos="fade-right">
                <img src="{{ asset($unduh->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-7 mb-5" data-aos="fade-left">
                <h1 class="fw-bold mb-4 text-white display-4">{{ $unduh->title }}</h1>
                <h4 class="fw-bold mb-4 text-white">{{ $unduh->description }}</h4>
                <img src="{{ asset('assets/images/playstore.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
