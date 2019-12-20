@extends('template')
@section('content')
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5>Selamat datang di Virolin</h5>
              Dapatkan akses premium mendapatkan calon pembeli dalam satu website
            </div>
            Kini Anda akan segera menikmati semua fasilitas Virolin setelah melakukan 2 hal, yaitu:
            <ol>
              <li>Konfirmasi Pembayaran - <a href="{{ url('konfirmasi-pembayaran') }}">Konfirmasi Sekarang</a></li>
              <li>Lengkapi Profile Anda - <a href="{{ url('setting') }}">Klik Di sini</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection