@section('title')
  Payment &mdash; {{ $setting->site_title }}
@endsection

<div style="margin-top: 100px">
    <div class="container mb-lg-5">

        <div class="row mt-4 mb-4 justify-content-center">

            <div class="col-md-4 text-center">
                <h3 class="font-weight-bold">TERIMA KASIH</h3>
                <h5>PESANAN BERHASIL DIBUAT</h5>
                <hr>
                {{ $invoice->name }}
                <br>
                {{ $invoice->address }}
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 text-center mb-3">
                <div class="card border-0 rounded-lg shadow">
                    <div class="card-body">
                        <h4 class="font-weight-bold">{{ $invoice->invoice }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6 text-center mb-3">
                <div class="card border-0 rounded-lg shadow">
                    <div class="card-body">
                        <h4 class="font-weight-bold">TOTAL : {{ money_id($invoice->grand_total) }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    Silahkan lakukan pembayaran ke salah satu rekening dibawah ini, pastikan nominal transfer sesuai dengan <strong>TOTAL</strong>.
                </div>
            </div>

            <div class="col-md-4 mt-3 text-center">
                <div class="card h-100 border-0 rounded-lg shadow">
                    <div class="card-body">
                        <img src="{{ asset('images/payment-bca.png') }}" style="width: 150px">
                        <hr>
                        <h6>FIKA RIDAUL MAULAYYA</h6>
                        <p></p>
                        <h6 class="font-weight-bold">1131458971</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3 text-center">
                <div class="card h-100 border-0 rounded-lg shadow">
                    <div class="card-body">
                        <img src="{{ asset('images/payment-mandiri-syariah.png') }}" style="width: 150px">
                        <hr>
                        <h6>FIKA RIDAUL MAULAYYA</h6>
                        <p></p>
                        <h6 class="font-weight-bold">7130309725</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3 text-center">
                <div class="card h-100 border-0 rounded-lg shadow">
                    <div class="card-body">
                        <img src="{{ asset('images/payment-jenius.png') }}" style="width: 150px">
                        <hr>
                        <h6>FIKA RIDAUL MAULAYYA</h6>
                        <p></p>
                        <h6 class="font-weight-bold">90011961874</h6>
                    </div>
                </div>
            </div>

        </div>

        <div class="row text-center justify-content-center mt-lg-5 mt-5">
            <div class="col-md-5">
                Setelah melakukan transfer, silahkan lakukan <strong>konfirmasi pembayaran</strong> melalui tombol dibawah ini :
                <div class="konfirmasi-pembayaran mt-lg-5">
                    @if (Auth::guard('customer')->check())
                        @if ($invoice->status == "menunggu pembayaran")
                            <button data-toggle="modal" data-target="#konfirmasi-pembayaran" class="btn btn-dark btn-lg btn-block mt-3 shadow"> KONFIRMASI PEMBAYARAAN</button>
                        @endif
                    @else
                        <div data-toggle="tooltip" data-placement="bottom" title="Silahkan Masuk Terlebih Dahulu!">
                            <a href="{{ route('customer.auth.login') }}" class="btn btn-dark btn-lg btn-block mt-3 shadow"> KONFIRMASI PEMBAYARAAN</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
