@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner pd-0-force mg-0-force ht-100vh bg-white">
    <div class="row no-gutters pd-b-20 pd-t-15 wd-100p clearfix">
        <!--================================-->
        <!--  Invoice Start -->
        <!--================================-->
        <div class="card pd-20 wd-80p m-auto">
            <h5 class="card-title bd-b pd-y-20">Invoice <a href="" class="tx-dark">#{{ $detail_order->invoice }}</a></h5>
            <div class="card-body pd-0 printing-area">
            <div class="row">
                <div class="col-md-3">
                    <address>
                        <img src="{{ asset('template/metrical') }}/images/logo-virolin-sidebar.png" class="img-fluid" alt="logo"><br><br>
                        <strong>Virolin.com</strong><br>
                        Jl. Bahagia No. 34<br>
                        Bandung, Jawa Barat<br>
                        Phone: (0821) 12345678 <br>
                        Email: cs@virolin.com
                    </address>
                </div>
                <div class="col-md-3 ml-md-auto text-md-right">
                    <h4 class="text-dark">To:</h4>
                    <address>
                        <strong>{{ $detail_order->user->name }}</strong><br>
                        <abbr title="Email">E:</abbr> {{ $detail_order->user->email }}
                    </address>
                    <br><br>
                    <span><strong>Invoice Date:</strong> {{ date('d-m-Y', strtotime($detail_order->order_date)) }}</span>
                    <br>
                    <span><strong>Expired Date:</strong> {{ date('d-m-Y', strtotime($detail_order->order_end)) }}</span>
                    <br><br><br><br><br>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
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
            <br><br>
            <div class="row">
                <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Notes:</h5>
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Silahkan transfer sesuai dengan jumlah yang tertera plus <strong>3 digit kode unik</strong> agar proses aktivasi berjalan dengan cepat.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <img src="{{ asset('storage/'.$detail_order->bank->bank_image) }}" alt="{{ $detail_order->bank->bank_name }}" class="img-fluid float-left" style="width:30%">
                        <span class="text-muted well well-sm shadow-none">{{ "(".$detail_order->bank->bank_code.") ".$detail_order->bank->bank_number }}<br>an. Wildan Fuady</span>
                    </div>
                </div>
                </div>
                <div class="col-md-4 ml-md-auto text-right">
                <div class="table-responsive">
                        <table class="table">
                            <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{ "Rp. ".number_format($detail_order->product->product_price) }}</td>
                            </tr>
                            <tr>
                            <th>Kode Unik</th>
                            <td>{{ "Rp. ".number_format($detail_order->kode_unik) }}</td>
                            </tr>
                            <tr>
                            <th>Total:</th>
                            <td>{{ "Rp. ".number_format($detail_order->product->product_price + $detail_order->kode_unik) }}</td>
                            </tr>
                        </table>
                        </div>
                </div>
            </div>
            <hr>
            <div class="text-right mg-y-20">
                <button type="button" class="btn btn-primary mg-t-5" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
            </div>
            </div>
        </div>
        <!--/ Invoice End -->
    </div>
</div>
<!--/ Page Inner End -->
<!--================================-->
@include('partials.footer')