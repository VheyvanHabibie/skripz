<div class="section bg-ekosistem">
    <div class="container pt-5 pb-5" style="min-height: 100vh">
        <h1 class="display-5 fw-bold mb-5 text-dark text-center" data-aos="fade-up">Mitra Pengguna</h1>
        <div class="row justify-content-center">
            @foreach ($mitra as $item)
                <div class="col-md-2" data-aos="zoom-in">
                    <div class="card shadow">
                        <div class="card-img-top text-center p-2">
                            <img src="{{ asset($item->logo) }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold text-dark text-center">{{ $item->nama_mitra }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
