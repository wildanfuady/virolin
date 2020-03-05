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
            <h1 class="pd-0 mg-0 tx-20">Manajemen Produk</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Products</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            List Produk
                            @can('products-create')
                                <a class="btn btn-info btn-sm float-right" href="{{ route('products.create') }}"> Tambah Produk</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body collapse show">
                        <?php
                            if($msg_success = Session::get('success')){
                                $class = "alert alert-success alert-dismissable";
                                $msg = $msg_success;
                            } else if($msg_info = Session::get('info')){
                                $class = "alert alert-info alert-dismissable";
                                $msg = $msg_info;
                            } else if($msg_warning = Session::get('warning')){
                                $class = "alert alert-warning alert-dismissable";
                                $msg = $msg_warning;
                            } else {
                                $class = "d-none";
                                $msg = "";
                            }
                        ?>
                        <div class="{{ $class }}" id="alert-msg">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ $msg }}
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-10">
                                <div class="form-group">
                                    {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari produk ...', 'id' => 'search']) }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Nama Produk</th>
                                    <th>Max DB</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th width="150px" style="text-align:center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_max_db }}</td>
                                    <td>Rp. {{ number_format($product->product_price) }}</td>
                                    <td>{{ $product->product_status }}</td>
                                    <td style="text-align:center">
                                    <div class="btn-group">
                                        <a class="btn btn-light btn-sm" href="{{ route('products.show',$product->product_id) }}"><i class="fa fa-eye"></i></a>
                                        @can('products-edit')
                                        <a class="btn btn-light btn-sm" href="{{ route('products.edit',$product->product_id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('products-delete')
                                        <a class="btn btn-light btn-sm" href="{{ url('products/destroy/'.$product->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row float-right">
                            <div class="col-md-12">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

        $("#search").keypress(function(event){
            if(event.keyCode == 13) { // kode enter
                filter();
            }
        });

        $("#btn-search").click(function(event){
            filter();
        });

        var filter = function(){
            var keyword = $("#search").val();
            console.log(keyword);

            window.location.replace("{{ url('products') }}?keyword=" + keyword);
        }
    });

</script>

@include('partials.footer')