<div class="section" style="background-color: #365486">
    <div class="container pt-5 pb-5" id="paket">
        <h1 class="display-5 fw-bold text-center text-white mb-5" data-aos="fade-up" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100" class="scrollspy-example" tabindex="0">Pilihan Paket</h1>
        <center>
            <ul class="nav nav-pills nav-fill mb-5 col-md-8 " id="myTab" role="tablist">
                <li class="nav-item pe-4" role="presentation">
                    <button class="nav-link active fw-bold" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                        type="button" role="tab" aria-controls="tab1" aria-selected="true">Akademisi</button>
                </li>
                <li class="nav-item pe-4" role="presentation">
                    <button class="nav-link fw-bold" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                        type="button" role="tab" aria-controls="tab2" aria-selected="false">Industri</button>
                </li>
            </ul>
        </center>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="row justify-content-center">
                    @foreach ($paket_akademisi as $item)
                        <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="card h-100 bg-white shadow">
                                <div class="card-body p-5 d-flex flex-column flex-grow-1">
                                    <div class="row d-flex">
                                        <div class="col-md-6"><h3 class="fw-bold mb-3">{{ $item->title }}</h3></div>
                                        <div class="col-md-6 text-end"><p>{!! $item->description !!}</p></div>
                                    </div>
                                    <h2 class="fw-bold mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }} <span class="fw-light">/</span><span class="fw-medium fs-6">{{ $item->duration }}</span></h2>
                                    <div class="mb-5">
                                        {!! $item->fitur !!}
                                    </div>
                                    <div class="mt-auto d-grid">
                                        <a class="btn btn-custom bg-unduh btn-lg fw-bold" href="{{ route('langganan.store', ['slug' => Str::slug($item->kategori . ' ' . $item->jenis)]) }}">Pilih Paket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <div class="row justify-content-center">
                    @foreach ($paket_industri as $item)
                        <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="card h-100 bg-white shadow">
                                <div class="card-body p-5 d-flex flex-column flex-grow-1">
                                    <div class="row d-flex">
                                        <div class="col-md-6"><h3 class="fw-bold mb-3">{{ $item->title }}</h3></div>
                                        <div class="col-md-6 text-end"><p>{!! $item->description !!}</p></div>
                                    </div>
                                    <h2 class="fw-bold mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }} <span class="fw-light">/</span><span class="fw-medium fs-6">{{ $item->duration }}</span></h2>
                                    <div class="mb-5">
                                        {!! $item->fitur !!}
                                    </div>
                                    <div class="mt-auto d-grid">
                                        <a class="btn btn-custom bg-unduh btn-lg fw-bold" href="{{ route('langganan.store', ['slug' => Str::slug($item->kategori . ' ' . $item->jenis)]) }}">Pilih Paket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Custom CSS for button background color -->
<style>
    #tab1-tab {
        border: 2px solid;
        border-color: #fff
        background-color: transparent;
        color: white;
    }

    #tab2-tab {
        border: 2px solid;
        border-color: #fff
        background-color: transparent;
        color: white;
    }

    #tab1-tab:hover {
        background-color: #b7cbee;
        color: #365486
    }

    #tab2-tab:hover {
        background-color: #b7cbee;
        color: #365486
    }

    #tab1-tab.active {
        background-color: #fff;
        border-color: #ffff;
        color: #365486;
    }

    #tab2-tab.active {
        background-color: #fff;
        border-color: #fff;
        color: #365486;
    }
</style>
