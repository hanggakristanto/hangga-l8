@section('title')
Dashboard &mdash; {{ $setting->site_title }}
@endsection

<div style="margin-top: -120px">
    <div class="container-fluid mb-lg-5 mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow rounded-lg mb-4">
                    <div class="card-body p-3">
                        <h6 class="font-weight-bold"><i class="fa fa-list-ul"></i> MAIN MENU</h6>
                        <hr>
                        @include('layouts.customer_menu')
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body">
                        <h6 class="font-weight-bold"><i class="fa fa-shopping-cart"></i> MY ORDERS</h6>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col" class="text-center">INVOICE</th>
                                    <th scope="col" class="text-center">GRAND TOTAL</th>
                                    <th scope="col" class="text-center">STATUS</th>
                                    <th scope="col" class="text-center" style="width: 15%;text-align: center">OPTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoices as $no => $invoice)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no + ($invoices->currentPage()-1) * $invoices->perPage() }}</th>
                                        <td>{{ $invoice->invoice }}</td>
                                        <td class="text-right">{{ money_id($invoice->grand_total) }}</td>
                                        <td class="text-center">
                                            @if ($invoice->status == "menunggu pembayaran")
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-circle-notch fa-spin"></i> {{ $invoice->status }}</button>
                                            @elseif($invoice->status == "menunggu konfirmasi")
                                                <button class="btn btn-sm btn-warning"><i class="fa fa-circle-notch fa-spin"></i> {{ $invoice->status }}</button>
                                            @elseif($invoice->status == "pembayaran tidak valid")
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i> {{ $invoice->status }}</button>
                                            @elseif($invoice->status == "pesanan diproses")
                                                <button class="btn btn-sm btn-info"><i class="fa fa-hourglass-start"></i> {{ $invoice->status }}</button>
                                            @elseif($invoice->status == "pesanan dikirim")
                                                <button class="btn btn-sm btn-primary"><i class="fa fa-truck"></i> {{ $invoice->status }}</button>
                                            @elseif($invoice->status == "pesanan selesai")
                                                <button class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> {{ $invoice->status }}</button>
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 20%">
                                            <a href="" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-sm btn-primary">
                                                <i class="fa fa-list-ul"></i>
                                            </a>
                                            @if ($invoice->status == "menunggu pembayaran" || $invoice->status == "pembayaran tidak valid")
                                                <a href="{{ route('frontend.payment.index', $invoice->invoice) }}" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pembayaran" class="btn btn-sm btn-success">
                                                    <i class="fa fa-credit-card"></i>
                                                </a>
                                            @endif
                                            @if ($invoice->no_resi != "")
                                                <span data-toggle="tooltip" data-placement="top" title="Tracking Order Progress">
                                                    <button data-courier="{{ strtolower($invoice->courier) }}" data-resi="{{ $invoice->no_resi }}" class="btn btn-tracking btn-sm btn-primary">
                                                        <i class="fa fa-truck"></i>
                                                    </button>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $invoices->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
