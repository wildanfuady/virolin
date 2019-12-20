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
            <h3>{{ $total_subscribers }}<sup style="font-size: 20px">of</sup><span style="font-size:20px;">@if(!empty($product->product_max_db)) {{ $product->product_max_db }} @else {{ "0" }} @endif</span></h3>

            <p>Total Subscriber</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="{{ route('mysubscribers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
      <section class="col-lg-7 connectedSortable">
        
        <!-- DIRECT CHAT -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Log Activity</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <div class="table-responsive">
              <table class="table table-bordered table-hovered table-striped">
                <thead class="bg-secondary">
                  <tr class="text-center">
                    <th width="10px">No</th>
                    <th>Name</th>
                    <th width="150px">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Wildan Fuady</td>
                    <td>11-12-2019 02:00</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Khadijah Efrison</td>
                    <td>11-12-2019 04:00</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Muzhaffarurrahman</td>
                    <td>12-12-2019 11:00</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Wildan Fuady</td>
                    <td>13-12-2019 14:00</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Wildan Fuady</td>
                    <td>14-12-2019 02:00</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--/.direct-chat -->

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Browsers
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="chart-responsive">
                  <canvas id="browser-chart" height="250"></canvas>
                </div>
                <!-- ./chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <ul class="chart-legend clearfix">
                  <li><i class="far fa-circle text-danger"></i> Chrome: 700</li>
                  <li><i class="far fa-circle text-success"></i> IE: 500</li>
                  <li><i class="far fa-circle text-warning"></i> FireFox: 400</li>
                  <li><i class="far fa-circle text-info"></i> Safari: 600</li>
                  <li><i class="far fa-circle text-primary"></i> Opera: 300</li>
                  <li><i class="far fa-circle text-secondary"></i> Navigator: 100</li>
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

  var pieChartCanvas = $('#browser-chart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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