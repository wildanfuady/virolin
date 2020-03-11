@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Edit Order</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Edit Order</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Edit Data Order
                        </h4>
                    </div>
                    {{ Form::model($orders, ['method' => 'PATCH','route' => ['orders.update', $orders->order_id]]) }}
                    <div class="card-body collapse show">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Terjadi kesalahan saat menginput data.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('order_name', 'Customer Name') }}
                                    {{ Form::text('order_title', $orders->product_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Customer Name', 'disabled']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_status', 'Status') }}
                                    <small class="sidetitle">Edit status customer Anda</small>
                                    {{ Form::select('order_status', ['Success' => 'Success', 'Expired' => 'Expired'], $orders->order_status, ['class'=> 'form-control', 'placeholder'=> 'Choose One']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_product', 'Product') }}
                                    {{ Form::text('order_start', $orders->product->product_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Name', 'disabled']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_max_db', 'Total Database') }}
                                    {{ Form::text('order_max_db', $orders->product_max_db, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Max DB', 'disabled']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('order_bank', 'Payment') }}
                                    {{ Form::text('order_bank', $orders->bank->bank_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Customer Name', 'disabled']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_date', 'Date') }}
                                    {{ Form::text('order_date', date('d-m-Y', strtotime($orders->order_date)), ['class'=> 'form-control', 'placeholder'=> 'Enter Order Date', 'disabled']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('order_price', 'Price') }}
                                    {{ Form::text('order_price', $orders->product->product_price, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Price', 'disabled']) }}
                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('orders') }}" class="btn btn-outline-info">Back</a>
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')