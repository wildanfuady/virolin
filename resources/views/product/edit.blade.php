@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
@endsection
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
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Edit Product
                        </h4>
                    </div>
                    {{ Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->product_id], 'id' => 'form_edit_product']) }}
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
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    {{ Form::label('name', 'Nama Produk') }}
                                    {{ Form::text('product_name', $product->product_name, array('placeholder' => 'Nama Produk','class' => 'form-control', 'id' => 'product_name')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('max_db', 'Max DB') }}
                                    <span class="sidetitle">Maksimal Database Per Produk</span>
                                    {{ Form::number('product_max_db', $product->product_max_db, array('placeholder' => 'Max DB','class' => 'form-control', 'id' => 'product_max_db')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('price', 'Harga Produk') }}
                                    {{ Form::number('product_price', $product->product_price, array('placeholder' => 'Product Price','class' => 'form-control', 'id' => 'product_price')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('status', 'Status') }}
                                    {{ Form::select('product_status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], $product->product_status, array('placeholder' => 'Choose One','class' => 'form-control', 'id' => 'product_status')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tipe', 'Tipe') }}
                                    {{ Form::select('product_type', ['bulanan' => 'Bulanan', 'tiga_bulan' => 'Tiga Bulan', 'enam_bulan' => 'Enam Bulan', 'tahunan' => 'Tahunan'], $product->product_type, array('placeholder' => 'Pilih Tipe Produk','class' => 'form-control', 'id' => 'product_type')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('desc', 'Deskripsi Produk') }}
                                    {{ Form::textarea('product_desc', $product->product_desc, array('placeholder' => 'Deskripsi Produk','class' => 'form-control', 'id' => 'product_desc')) }}
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('products.index') }}" class="btn btn-outline-info">Back</a>
                                <button type="button" id="btn_edit_product" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                        
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>	
@endsection
@include('partials.footer')