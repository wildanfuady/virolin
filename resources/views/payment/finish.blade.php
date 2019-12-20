@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Payments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Menunggu Pembayaran
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Order ID</th>
                                        <td>{{$result->order_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Time</th>
                                        <td>{{$result->transaction_time}}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <td>{{$result->transaction_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product</th>
                                        <td>{{$order->product->product_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{$result->gross_amount}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Type</th>
                                        <td>{{$result->payment_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{$result->status_message}}</td>
                                    </tr>
                                    @if(!empty($result->pdf_url))
                                    <tr>
                                        <th>Panduan Pembayaran</th>
                                        <td><a target="_blank" href="{{$result->pdf_url}}">Lihat</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
