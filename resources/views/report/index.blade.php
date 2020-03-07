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
            <h1 class="pd-0 mg-0 tx-20">Reports</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Reports</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Jumlah Share dan Visitor Per Campaign
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
                            <canvas id="chartBar1" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Detail Report Campaign
                        </h4>
                        <div class="card-header-btn">
                            <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                        </div>
                    </div>
                    <div class="collapse show">
                        <div class="card-body collapse show" id="collapse1">
                            <table id="basicDataTable" class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px" class="text-center">No</th>
                                        <th>Campaign</th>
                                        <!-- <th>Jumlah Share</th>
                                        <th>Total Visitor</th> -->
                                        <th style="width: 200px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($shares as $key => $data)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $data->campaign_name }}</td>
                                        <!-- <td>
                                            @foreach ($share as $trafikShare)
                                                @if ($trafikShare->campaign_id == $data->campaign_id)
                                                    {{ $trafikShare->total }}
                                                @else
                                                    {{-- 0 --}}
                                                @endif
                                            @endforeach
                                        </!-->
                                        <!-- <td> -->
                                            {{-- @foreach ($visitor as $trafikVisitor)
                                                @if ($trafikVisitor->campaign_id == $data->campaign_id)
                                                    {{ $trafikVisitor->total }}
                                                @else
                                                    0
                                                @endif
                                            @endforeach --}}
                                        <td class="text-center">
                                            <a href="{{ route('report.show', $data->campaign_slug) }}" class="btn btn-primary">Buka Laporan</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mg-b-100">
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
                <div class="card mg-b-100">
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
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/chartjs/chartjs.js"></script>
<script>
var ctx1 = document.getElementById('chartBar1').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: [
            @foreach ($share as $labels)
                "{{ $labels->campaign_name }}",
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach ($share as $data)
                    "{{ $data->total }}",
                @endforeach
            ],
            backgroundColor: '#5D78FF',
            borderWidth: 1,
            fill: true,
            label: 'Total Share'
        }, {
            data: [
                @foreach ($share as $labels)
                    @foreach ($visitor as $data)
                        @if ($labels->campaign_id == $data->campaign_id)
                            "{{ $data->total }}",
                        @endif
                    @endforeach
                @endforeach
            ],
            backgroundColor: '#63CF72',
            borderWidth: 1,
            fill: true,
            label: 'Total Visitor'
        }]
    },
    options: {
        legend: {
            display: true,
            labels: {
                display: true
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

var ctx2 = document.getElementById('chartBrowser').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: [
            @foreach ($trafik as $data)
                "{{ $data->trafik_browser }}",
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach ($trafik as $data)
                    "{{ $data->total }}",
                @endforeach
            ],
            backgroundColor: ['#5D78FF','#63CF72','#C9D5FA','#00a65a', '#00c0ef', '#f56954'],
            borderWidth: 1,
            fill: true,
            label: 'Value1'
        }]
    },
 
});
var ctx3 = document.getElementById('chartMonth').getContext('2d');
var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November' ,'Desember'],
        datasets: [{
            data: [{{$trafik_jan}},{{$trafik_feb}},{{$trafik_mar}},{{$trafik_apr}},{{$trafik_mei}},{{$trafik_jun}},{{$trafik_jul}},{{$trafik_agu}},{{$trafik_sep}},{{$trafik_okt}},{{$trafik_nov}},{{$trafik_des}}],
            backgroundColor: '#5D78FF',
            borderWidth: 1,
            fill: true,
            label: 'Total'
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
@endsection
@include('partials.footer')