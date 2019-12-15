@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Order</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            {{ Form::open(['url' => 'order/update/'.$orders->order_id]) }}
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('order_name', 'Customer Name') }}
                            {{ Form::text('order_title', $orders->product_name, ['class'=> 'form-control', 'placeholder'=> 'Enter Customer Name', 'readonly']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('order_status', 'Status') }}
                            {{ Form::select('order_status', ['Pending' => 'Pending', 'Active' => 'Active', 'Expired' => 'Expired'], $orders->order_status, ['class'=> 'form-control', 'placeholder'=> 'Choose One']) }}
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
                            {{ Form::text('order_price', 'Rp. '.$orders->product->product_price, ['class'=> 'form-control', 'placeholder'=> 'Enter Product Price', 'readonly']) }}
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ url('orders') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
