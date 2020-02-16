@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Report Trafik</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Report Trafik</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-lg-6">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Chart Browser
                        </h4>
                        <div class="card-header-btn">
                            <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse1" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="card-body collapse show" id="collapse11">
                        <div class="clearfix">
                            <canvas id="chartBrowser" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Data Pengunjung tahun 2020
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
                            <canvas id="chartMonth" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->
@include('partials.footer')  
<script src="{{ asset('template/metrical') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/metrical') }}/plugins/datatables/responsive/dataTables.responsive.js"></script>
<script src="{{ asset('template/metrical') }}/plugins/datatables/extensions/dataTables.jqueryui.min.js"></script>
<script>
var ctx1 = document.getElementById('chartBrowser').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: ['Google', 'Firefox', 'Facebook', 'Twitter', 'Opera', 'Whatsapp'],
        datasets: [{
            data: [10, 24, 20, 25, 35, 50],
            backgroundColor: '#5D78FF',
            borderWidth: 1,
            fill: true,
            label: 'Value1'
        }]
    },
 
});
var ctx2 = document.getElementById('chartMonth').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November' ,'Desember'],
        datasets: [{
            data: [10, 24, 20, 25, 35, 50, 10],
            backgroundColor: '#5D78FF',
            borderWidth: 1,
            fill: true,
            label: 'Value1'
        }, {
            data: [10, 24, 20, 10, 24, 20, 25],
            backgroundColor: '#63CF72',
            borderWidth: 1,
            fill: true,
            label: 'Value2'
        }, {
            data: [20, 30, 28, 33, 10, 24, 20],
            backgroundColor: '#C9D5FA',
            borderWidth: 1,
            fill: true,
            label: 'Value3'
        }]
    },
    options: {
        legend: {
            display: false,
            labels: {
                display: false
            }
        },
        scales: {
            yAxes: [{
                stacked: true
            }],
            xAxes: [{
                stacked: true
            }]
        }
    }
});
</script>