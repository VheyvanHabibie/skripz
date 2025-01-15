@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Langganan Pro 1 Tahun</h5>
                        <h6 class="mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nostrum tenetur unde
                            delectus ut quod quisquam facere enim adipisci exercitationem. Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Libero, repudiandae?
                        </h6>
                        <li class="text-dark">Lorem, ipsum dolor. Lorem, ipsum dolor. Lorem, ipsum</li>
                        <li class="text-dark">Lorem, ipsum dolor. Lorem, ipsum dolor. Lorem, ipsum</li>
                        <li class="text-dark">Lorem, ipsum dolor. Lorem, ipsum dolor. Lorem, ipsum</li>
                        <li class="text-dark">Lorem, ipsum dolor. Lorem, ipsum dolor. Lorem, ipsum</li>
                        <li class="text-dark">Lorem, ipsum dolor. Lorem, ipsum dolor. Lorem, ipsum</li>
                        <a class="btn btn-primary btn-block mt-3" href="{{ route('premium.pay') }}">Langganan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
