@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Reports</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Reports</a>
            </div>
        </div>
        <div class="row row-xs clearfix">
            <div class="col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Data Laporan Administrator
                        </h4>
                        <div class="card-header-btn">
                            <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse1" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="card-body collapse show" id="collapse1">
                        <div class="clearfix">
                            <canvas id="users-chart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            
<script>
$(function(){
    // Search 
    $("#search").keypress(function(event){
        if(event.keyCode == 13) { // kode enter
            filter();
        }
    });

    $("#btn-search").click(function(event){
        filter();
    });

    var filter = function(){
        var keyword = $("#search").val();
        console.log(keyword);

        window.location.replace("{{ url('reports/user') }}?keyword=" + keyword);
    }
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

    // product user chart
    var pieChartCanvas = $('#users-product-chart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          @foreach ($users_product as $itemProduct)
            '{{$itemProduct->product_name}}',
          @endforeach
      ],
      datasets: [
        {
          data: [
              @foreach($users_product as $itemProductC)
                @foreach($users_product_count as $itemProductCount)
                    @if($itemProductC->product_id == $itemProductCount->product_id)
                        '{{$itemProductCount->total}}',
                    @endif
                @endforeach
              @endforeach
          ],
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

@include('partials.footer')