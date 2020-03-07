@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Reports</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="callout callout-warning">
            <h5><i class="fa fa-exclamation-triangle text-warning"></i> Penting:</h5>
            Masa aktif akun Anda akan berakhir pada <strong>{{ date('d-m-Y', strtotime($order->order_end)) }}</strong>. Lakukan <strong>perpanjangan / renewal</strong> akun maksimal seminggu sebelum masa aktif berakhir. 
        </div>
        <div class="card mg-b-100">
            <div class="card-header">
                Halaman Report Order
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Produk</th>
                                <th>Tanggal Beli</th>
                                <th>Tanggal Berakhir</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->invoice }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ date('d-m-Y H:i', strtotime($order->order_date)) }}</td>
                                <td>{{ date('d-m-Y H:i', strtotime($order->order_end)) }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="" class="btn btn-warning">Renewal</a>
                                    <a href="" class="btn btn-danger">Stop</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection