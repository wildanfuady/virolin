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
    <!-- Small boxes (Stat box) -->
    @if(Auth::user()->status == "valid" || Auth::user()->status == "Valid")
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $total_users }}<sup style="font-size: 20px"></sup><span style="font-size:20px;"></span></h3>

            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $total_landingpage}}</h3>

            <p>Landing Page</p>
          </div>
          <div class="icon">
            <i class="fas fa-bars"></i>
          </div>
          <a href="{{ route('landingpages.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>Total Share</p>
          </div>
          <div class="icon">
            <i class="fas fa-paper-plane"></i>
          </div>
          <a href="{{ url('report/share') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Total Visitor</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <a href="{{ url('report/trafik') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">
        
        {{-- card --}}
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Chart Users
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="chart-responsive">
                  <canvas id="users-chart" height="250"></canvas>
                </div>
                <!-- ./chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <ul class="chart-legend clearfix">
                  <li><i class="far fa-circle text-success"></i> Users Aktif: {{$users_aktif}}</li>
                  <li><i class="far fa-circle text-info"></i> Users Kadaluarsa: {{$users_kadaluarsa}}</li>
                  <li><i class="far fa-circle text-danger"></i> Users Nonaktif: {{$users_nonaktif}}</li>
                </ul>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-6 connectedSortable">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Payment & Leads
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="chart-responsive">
                  <canvas id="payment-chart" height="250"></canvas>
                </div>
                <!-- ./chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <ul class="chart-legend clearfix">
                  <li><i class="far fa-circle text-success"></i> Active: {{$total_active}} </li>
                  <li><i class="far fa-circle text-info"></i> Pending: {{$total_pending}}</li>
                  <li><i class="far fa-circle text-danger"></i> Expired: {{$total_expired}}</li>
                </ul>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->


        
      </section>
      <!-- right col -->
    </div>
    @else
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
    @endif
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>

$(function () {

  var pieChartCanvas = $('#payment-chart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Active',
          'Pending',
          'Expired',
      ],
      datasets: [
        {
          data: [{{$total_active}},{{$total_pending}},{{$total_expired}}],
          backgroundColor : ['#00a65a', '#00c0ef', '#f56954'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

    // users chart

    var pieChartCanvas = $('#users-chart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Jumlah User Aktif',
          'Kadaluarsa',
          'Jumlah User Non Aktif'
      ],
      datasets: [
        {
          data: [{{$users_aktif}},{{$users_kadaluarsa}},{{$users_nonaktif}}],
          backgroundColor : ['#00a65a', '#00c0ef', '#f56954'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

});
</script>
@endsection