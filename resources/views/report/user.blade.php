@extends('template')
@section('content')
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Report User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Report User</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
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
                                    <li><i class="far fa-circle text-info"></i> Users Kadaluarsa: {{$users_kadaluarsa}}
                                    </li>
                                    <li><i class="far fa-circle text-danger"></i> Users Nonaktif: {{$users_nonaktif}}
                                    </li>
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
            
            <!-- right col -->
        </div>
    </div>
</div>

<script>
$(function(){
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
