@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Payment Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payment Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                Halaman payment orders isinya adalah informasi tentang:
                <br>
                <ul>
                    <li>Informasi masa aktif user / masa langganan</li>
                    <li>Informasi produk yang dia beli</li>
                    <li>maksimal database yang boleh dia punya</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
