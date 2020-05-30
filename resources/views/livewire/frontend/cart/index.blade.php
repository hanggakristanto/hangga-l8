<div class="mb-5">
    <div class="container-fluid mb-lg-5" style="margin-top: 80px;">

        <div class="row mt-4 mb-4 justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow rounded-md">
                    <div class="card-body">
                        <h5><i class="fa fa-shopping-cart"></i> DETAIL PESENAN</h5>
                        <hr>
                        @php
                            $totalPrice = 0;
                            $weight = 0;
                        @endphp
                        <table class="table"
                            style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                            <tbody>
                                @foreach($cart['products'] as $product)

                                @php
                                    $harga_set = $product->price * $product->discount / 100;
                                    $harga_diskon = $product->price - $harga_set;
                                @endphp

                                <tr style="background: #edf2f7;">
                                    <td class="b-none" width="25%">
                                        <div class="wrapper-image-cart">
                                            <img src="{{ Storage::url('public/products/'.$product->image) }}" style="width: 100%;border-radius: .5rem">
                                        </div>
                                    </td>
                                    <td class="b-none" width="50%">
                                        <h5><b>{{ $product->title }}</b></h5>
                                        <table class="table-borderless" style="font-size: 14px">
                                            <tr>
                                                <td style="padding: .20rem">PRICE</td>
                                                <td style="padding: .20rem">:</td>
                                                <td style="padding: .20rem">{{ money_id($harga_diskon) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: .20rem">QTY</td>
                                                <td style="padding: .20rem">:</td>
                                                <td style="padding: .20rem"><b>{{ $product->unit_weight }} {{ $product->unit }}</b></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="b-none text-right">
                                        <div class="text-right">
                                            <button wire:click="removeCart({{ $product->id }})" class="btn btn-sm shadow btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                @php
                                    $totalPrice += $harga_diskon;
                                    $weight += $product->weight;
                                @endphp

                                @endforeach

                            </tbody>
                        </table>

                        <table class="table table-default">
                            <tbody>
                                <tr>
                                    <td class="set-td text-left" width="60%">
                                        <p class="m-0">TOTAL </p>
                                    </td>
                                    <td class="set-td  text-right" width="30%">&nbsp; : Rp.</td>
                                    <td class="text-right set-td ">
                                        <p class="m-0" id="subtotal"> {{ number_format($totalPrice, '0', '', '.') }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="set-td text-left border-0" width="60%">
                                        <p class="m-0">DISCOUNT </p>
                                    </td>
                                    <td class="set-td  text-right border-0" width="30%">&nbsp; : Rp.</td>
                                    <td class="text-right border-0 set-td ">
                                        <p class="m-0" id="diskon"> 0</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="set-td text-left border-0">
                                        <p class="m-0">SHIPPING (<strong>{{ $weight }}</strong> gr)</p>
                                    </td>
                                    <td class="set-td border-0 text-right">&nbsp; : Rp.</td>
                                    <td class="set-td border-0 text-right">
                                        <p class="m-0" id="ongkir-cart">0</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-left border-0">
                                        <p class="font-weight-bold m-0 h5 text-uppercase">GRAND TOTAL </p>
                                    </td>
                                    <td class=" border-0 text-right">&nbsp; : Rp.</td>
                                    <td class=" border-0 text-right">
                                        <p class="font-weight-bold m-0 h5" id="grand-total" align="right">0</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-md">
                    <div class="card-body">
                        <h5><i class="fa fa-user-circle"></i> SILAHKAN MASUK / DAFTAR</h5>
                        <hr>
                        <button data-toggle="modal" data-target="#account" class="btn btn-dark btn-block btn-lg shadow"><i class="fa fa-user-circle"></i> LOGIN / REGISTER</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
