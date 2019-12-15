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
                @can('products-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
                List Product
            </div>
            <div class="card-body">
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
                    <div class="col-md-11">
                        <div class="form-group">
                            {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari produk ...', 'id' => 'search']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="bg-info">
                            <th width="20px">No</th>
                            <th>Name</th>
                            <th>Max DB</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th width="150px" style="text-align:center">Action</th>
                        </tr>
                        @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_max_db }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_status }}</td>
                            <td style="text-align:center">
                            <div class="btn-group">
                                <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye"></i></a>
                                @can('products-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('products-delete')
                                <a class="btn btn-danger btn-sm" href="{{ url('products/destroy/'.$product->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                @endcan
                            </div>
                            </td>
                        </tr>
                        @endforeach
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

@endsection
