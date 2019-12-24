@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
           
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table">
                            <table class="table table-hover">
                                <tr>
                                    <td>Invoice No</td>
                                    <td>:</td>
                                    <td>{{ $order->invoice }}</td>
                                </tr>
                                <tr>
                                    <td>Product</td>
                                    <td>:</td>
                                    <td>{{ $order->product->product_name }}</td>
                                </tr>
                               <tr>
                                    <td>Product Price</td>
                                    <td>:</td>
                                    <td>{{ number_format($order->product->product_price + $order->kode_unik) }}</td>
                                </tr>
                                <tr>
                                    <td>Order Date</td>
                                    <td>:</td>
                                                                       <td>{{ $order->order_date }}</td>

                                </tr>
                                <tr>
                                    <td>Order End</td>
                                    <td>:</td>
                                    <td>{{ $order->order_end }}</td>
                                </tr>
                                <tr>
                                    <td>Order Status</td>
                                    <td>:</td>
                                    <td>{{ $order->order_status }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Type</td>
                                    <td>:</td>
                                    <td>{{ $order->transaction_id }}</td>
                                </tr>
                                @if($order->payment_type == "echannel")
                                <tr>
                                    <td>Instruction</td>
                                    <td>:</td>
                                    <td><a href="https://app.sandbox.midtrans.com/snap/v1/transactions/c12e1945-181c-4bdf-97a6-7bfee4aa8437/pdf" target="_blank">Lihat</a> </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
