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
            <h1 class="pd-0 mg-0 tx-20">Detail Product</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Detail Product</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card" style="margin-bottom: 20%">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Detail Product
                    </h4>
                </div>
                <div class="card-body collapse show">
               
                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <tr>
                                    <th style="width:60%">Name</th>
                                    <td>: {{ $product->product_name }}</td>
                                </tr>
                                <tr>
                                    <th>Maksimal DB</th>
                                    <td>: {{ $product->product_max_db }} database</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>: Rp. {{ number_format($product->product_price) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>: {{ $product->product_status }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>: {{ $product->product_desc }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')