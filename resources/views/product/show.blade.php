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
                Detail a Product
            </div>
            <div class="card-body">
               
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
@endsection
