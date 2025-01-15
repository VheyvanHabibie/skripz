@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Langganan Pro</h5>
                        <h6 class="mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nostrum tenetur unde delectus ut quod quisquam facere enim adipisci exercitationem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, repudiandae?
                        </h6>
                        <button class="btn btn-primary btn-block" id="pay-button">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    Swal.fire({
                        title: "Pembayaran Sukses!",
                        icon: "success"
                    });
                },
                onPending: function(result) {
                    Swal.fire({
                        title: "Pembayaran Tertunda!",
                        icon: "warning"
                    });
                },
                onError: function(result) {
                    Swal.fire({
                        title: "Pembayaran Gagal!",
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endsection
