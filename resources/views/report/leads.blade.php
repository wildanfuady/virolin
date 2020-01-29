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
            <h1 class="pd-0 mg-0 tx-20">Report Leads</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Report Leads</a>
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
                            Report Lead Magnet
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
                                <li>Subscriber Baru Hari Ini</li>
                                <li>Subscriber Baru Minggu Ini</li>
                                <li>Subscriber Baru Bulan Ini</li>
                                <li>Subscriber Baru Semua Waktu</li>
                                <li>Jumlah Subscriber</li>
                                <li>Jumlah Maksimal Subscriber</li>
                            </ul>
                        </div>
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
                                    <span class="tx-uppercase tx-10 mg-b-10">Subscriber Baru Hari ini</span>					  
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
                                        <span class="tx-uppercase tx-10 mg-b-10">Subscriber Baru Minggu Ini</span>					  
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">131</span> </h2>
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
                                        <span class="tx-uppercase tx-10 mg-b-10">Subscriber Baru Bulan Ini</span>					  
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">1,242</span> </h2>
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
                                        <span class="tx-uppercase tx-10 mg-b-10">Subscriber Baru Semua Waktu</span>					  
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">5,324</span> </h2>
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
                                        <span class="tx-uppercase tx-10 mg-b-10">Jumlah Subscribers</span>					  
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">5,324</span> </h2>
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
                                        <span class="tx-uppercase tx-10 mg-b-10">Jumlah Maksimal Subscribers</span>					  
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">10,000</span> </h2>
                                    </div>
                                    </div>
                                </div>
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