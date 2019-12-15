@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit a New Product
            </div>
            {{ Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id], 'files' => TRUE]) }}
                
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            {{ Form::label('name', 'Nama Produk') }}
                            {!! Form::text('product_name', $product->product_name, array('placeholder' => 'Nama Produk','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('max_db', 'Max DB') }}
                            {!! Form::number('product_max_db', $product->product_max_db, array('placeholder' => 'Max DB','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('price', 'Harga Produk') }}
                            {!! Form::number('product_price', $product->product_price, array('placeholder' => 'Product Price','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('status', 'Status') }}
                            {!! Form::select('product_status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], $product->product_status, array('placeholder' => 'Choose One','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('desc', 'Deskripsi Produk') }}
                            {!! Form::textarea('product_desc', $product->product_desc, array('placeholder' => 'Deskripsi Produk','class' => 'form-control')) !!}
                        </div>

                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection 