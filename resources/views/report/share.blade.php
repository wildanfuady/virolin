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
            <h1 class="pd-0 mg-0 tx-20">Report Share WA</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Report Share WA</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <!--================================-->
            <!--  Annual Report Start-->
            <!--================================-->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Report Share WA
                        </h4>
                        <div class="card-header-btn">
                            <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                        </div>
                    </div>
                    <div class="collapse show">
                        <div class="card-body pd-t-0 pd-b-20 collapse show">
                            Rancangan:
                            <ul>
                                <li>Jumlah Share WA per minggu pakai chart line</li>
                                <li>Total masing2 landingpage punya jumlah share berapa (table)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Jumlah Share Per minggu
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
                            Report Share WA
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
                            <table id="basicDataTable" class="table responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Landing Page</th>
                                        <th>Jumlah Share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Landing Page 1</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Landing Page 2</td>
                                        <td>42</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Landing Page 3</td>
                                        <td>51</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Landing Page 4</td>
                                        <td>6</td>
                                    </tr>
                                </tbody>
                            </table>
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
var ctx1 = document.getElementById('chartBar1').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Senin', 'Selesa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        datasets: [{
            data: [10, 24, 20, 25, 35, 50, 10],
            backgroundColor: '#5D78FF',
            borderWidth: 1,
            fill: true,
            label: 'LP 1'
        }, {
            data: [10, 24, 20, 10, 24, 20, 25],
            backgroundColor: '#63CF72',
            borderWidth: 1,
            fill: true,
            label: 'LP 2'
        }, {
            data: [20, 30, 28, 33, 10, 24, 20],
            backgroundColor: '#C9D5FA',
            borderWidth: 1,
            fill: true,
            label: 'LP 3'
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