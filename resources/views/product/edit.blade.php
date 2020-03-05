@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Edit Product</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Edit Product</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Edit Product
                        </h4>
                    </div>
                    {{ Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id], 'files' => TRUE]) }}
                    <div class="card-body collapse show">
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