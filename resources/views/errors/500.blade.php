@extends('template')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>500 Server Error</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">500 Server Error</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="error-page">
        <h2 class="headline text-danger"> 500</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Maaf! Terjadi Kesalahan.</h3>

            <p>
            Server kami mengalami beberapa masalah.
            Mohon tunggu beberapa saat lagi atau <a href="{{ url('home') }}">kembali ke dashboard</a>.
            </p>

        </div>
    </div>
</section>

@endsection
