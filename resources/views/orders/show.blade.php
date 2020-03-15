@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Detail Order</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Detail Order</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Detail Data Order
                        </h4>
                    </div>
                    <div class="card-body collapse show">

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('order_name', 'Customer Name') }}
                                    {{ Form::text('order_title', $orders->product_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Customer Name', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_status', 'Status') }}
                                    {{ Form::text('order_status', $orders->order_status, ['class'=> 'form-control', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_product', 'Product') }}
                                    {{ Form::text('order_start', $orders->product->product_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Name', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_max_db', 'Total Database') }}
                                    {{ Form::text('order_max_db', $orders->product_max_db, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Max DB', 'readonly']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('order_bank', 'Payment') }}
                                    {{ Form::text('order_bank', $orders->bank->bank_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Customer Name', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_date', 'Date') }}
                                    {{ Form::text('order_date', date('d-m-Y', strtotime($orders->order_date)), ['class'=> 'form-control', 'placeholder'=> 'Enter Order Date', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_expired', 'Expired') }}
                                    {{ Form::text('order_expired', date('d-m-Y', strtotime($orders->order_end)), ['class'=> 'form-control', 'placeholder'=> 'Enter Order Expired', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_price', 'Price') }}
                                    {{ Form::text('order_price', $orders->product->product_price, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Price', 'readonly']) }}
                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('order.index') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')