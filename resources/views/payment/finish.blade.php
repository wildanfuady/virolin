@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
           
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr class="bg-primary">
                                    <td>No</td>
                                    <td>Invoice</td>
                                    <td>Product</td>
                                    <td>Order Date</td>
                                    <td>Order End</td>
                                    <td>Order Status</td>
                                </tr>

                                <?php $no = 1; ?>
                                @foreach($order as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->invoice }}</td>
                                    <td>{{ $row->product->product_name }}</td>
                                    <td>{{ $row->order_date }}</td>
                                    <td>{{ $row->order_end }}</td>
                                    <td>{{ $row->order_ }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
