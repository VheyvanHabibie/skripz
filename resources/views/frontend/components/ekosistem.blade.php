<div class="section bg-ekosistem">
    <div class="container pt-5 pb-5" id="ekosistem">
        <h1 class="display-5 fw-bold mb-4 text-center" data-aos="fade-up">{{ $ekosistem->title }}</h1>
        <h4 class="text-center mb-5 fw-bold" data-aos="fade-up">{!! $ekosistem->content !!}</h4>
        <div class="row justify-content-center">
            @foreach ($listekosistem as $item)
                <div class="col-md-3" data-aos="zoom-in">
                    <center>
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
                    </center>
                    <h4 class="fw-bold text-center mb-4">{{ $item->title }}</h4>
                    <h5 class="fw-bold">Gains</h5>
                    <div>
                        {!! $item->content !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
