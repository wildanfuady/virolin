@extends('template')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>404 Error Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">404 Error Page</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Maaf! Terjadi Kesalahan.</h3>

            <p>
            Kami tidak dapat menemukan halaman yang ingin Anda lihat.
            Kami menyarankan untuk <a href="{{ url('home') }}">kembali ke dashboard</a>.
            </p>

        </div>
    </div>
</section>

@endsection
