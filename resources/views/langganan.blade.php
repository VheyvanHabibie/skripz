@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5>Langganan Pro</h5>
                <h6>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nostrum tenetur unde delectus ut quod quisquam facere enim adipisci exercitationem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, repudiandae?
                </h6>
                <button class="btn btn-primary" id="pay-button">Langganan{{  $snapToken}}</button>

            </div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    window.location.href = "/premium/success";
                },
                onPending: function(result) {
                    alert("Pembayaran tertunda.");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                }
            });
        });
    </script>
@endsection
