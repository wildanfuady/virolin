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
                            Reports
                        </h4>
                    </div>
                    <div class="card-body collapse show">
                        Halaman report berisi tentang:
                        <ul>
                            <li>Grafik pengunjung dari berbagai browser</li>
                            <li>Total yang ngebuka si landing page</li>
                            <li>Total yang ngeshare</li>
                            <li>total yang ngisi data</li>
                            <li>total landing page yang dia punya</li>
                            <li>total subscriber per landingpage</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="media d-inline-flex">
                                <div>
                                    <span class="tx-uppercase tx-10 mg-b-10">Total Landing Page</span>					  
                                    <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">4</span> </h2>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="media d-inline-flex">
                                <div>
                                    <span class="tx-uppercase tx-10 mg-b-10">Total Share</span>					  
                                    <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">4</span> </h2>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="media d-inline-flex">
                                <div>
                                    <span class="tx-uppercase tx-10 mg-b-10">Total Mengisi Data</span>					  
                                    <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">4</span> </h2>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Chart Berdasarkan browser
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
                            Total Yang ngebuka Landing Page
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
                            <canvas id="chartLandingPage" height="150"></canvas>
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
                                        <th>Jumlah Subscriber</th>
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
</div>
@include('partials.footer')
<script type="text/javascript">
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
var ctx2 = document.getElementById('chartLandingPage').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['LP 1', 'LP 2', 'LP 3', 'LP 4', 'LP 5', 'LP 6'],
        datasets: [{
            data: [10, 24, 20, 25, 35, 50],
            backgroundColor: '#5D78FF',
            borderWidth: 1,
            fill: true,
            label: 'Value1'
        }]
    },
 
});
</script>