@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!--================================-->
        <!-- Breadcrumb Start -->
        <!--================================-->
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Finish</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Finish</a>
            </div>
        </div>
        <!--/ Breadcrumb End -->
        <!--================================-->

        <div class="row row-xs clearfix">
           
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
                                    <td>{{ $order->payment_type }}</td>
                                </tr>
                                @if($order->order_status == 'Waiting for payment')
                                <tr>
                                    <td>Instruction</td>
                                    <td>:</td>
                                    <td>@if ($order->order_status == 'Waiting for payment')
                                        <button class="btn btn-success btn-sm" onclick="snap.pay('{{ $order->transaction_id }}')">Complete Payment</button>
                                    @endif</td>
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
@include('partials.footer')