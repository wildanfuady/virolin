@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> Virolin.com
                                <small class="float-right">Date: {{ date('d-m-Y', strtotime($detail_order->order_date)) }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Admin Virolin.com</strong><br>
                                Jl. Bahagia No. 34<br>
                                Bandung, Jawa Barat<br>
                                Phone: (0821) 12345678 <br>
                                Email: cs@virolin.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{ $detail_order->user->name }}</strong><br>
                                Email: {{ $detail_order->user->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #{{ $detail_order->invoice }}</b><br>
                        <br>
                        <b>Order ID:</b> {{ $detail_order->id }}<br>
                        <b>Payment Due:</b> {{ date('d-m-Y', strtotime($detail_order->order_end)) }}<br>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Expired</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $detail_order->invoice }}</td>
                                        <td>{{ $detail_order->product->product_name }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($detail_order->order_date)) }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($detail_order->order_end)) }}</td>
                                        <td>{{ $detail_order->order_status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">Payment Methods:</p>
                        <img src="{{ asset('storage/'.$detail_order->bank->bank_image) }}" alt="{{ $detail_order->bank->bank_name }}">

                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Silahkan transfer sesuai dengan jumlah yang tertera plus 3 digit kode unik agar proses aktivasi berjalan dengan cepat.
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Tanggal Expired <b>{{ date('d-m-Y', strtotime($detail_order->order_end)) }}</b> jam <b>{{ date('H:i', strtotime($detail_order->order_end)) }}</b></p>

                        <div class="table-responsive">
                        <table class="table">
                            <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                            </tr>
                            <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                            </tr>
                            <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                            </tr>
                            <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                    <div class="col-12">
                        <a href="{{ url('konfirmasi-pembayaran') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="far fa-credit-card"></i> Bayar Sekarang
                        </a>
                    </div>
                    </div>
                </div>
            <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

@endsection