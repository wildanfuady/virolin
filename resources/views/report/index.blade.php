@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Reports</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                Halaman report berisi tentang:
                <ul>
                    <li>Grafik pengunjung dari berbagai browser</li>
                    <li>Total yang ngebuka si landing page</li>
                    <li>Total yang ngeshare</li>
                    <li>total yang ngisi data</li>
                    <li>total landing page yang dia punya</li>
                    <li>total subscriber per landingpage</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
