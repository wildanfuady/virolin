@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!--================================-->
        <!-- Breadcrumb Start -->
        <!--================================-->
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Dashboard</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Dashboard</a>
            </div>
        </div>
        <!--/ Breadcrumb End -->
        <!--================================-->

        @if(Auth::user()->status == "valid" || Auth::user()->status == "Valid")
        @else
        <!-- Konfirmasi Pembayaran -->
        <div class="row row-xs clearfix">
            <!--================================-->
            <!--  Annual Report Start-->
            <!--================================-->
            <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Welcome
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="annualReports">
                    <div class="card-body pd-t-0 pd-b-20 collapse show">
                        <div class="alert alert-info alert-dismissible mt-4">
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
            <!-- / Annual Report End -->
            <!--================================-->
        </div>
        <!-- Selesai Konfirmasi Pembayaran -->
        @endif
        <div class="row row-xs clearfix">

            <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                        <label>Subscriber</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                            <i class="icon-people tx-warning tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_subscribers }}</span></h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>User</span>subscribe</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                        <label>Campaign</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                            <i class="icon-diamond tx-success tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_landingpage}}</span></h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>Campaign</span>aktif</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                        <label>My Order</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                            <i class="icon-paper-plane tx-primary tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">{{ $order->product_name }}</h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>{{ $order->product_max_db }} </span> database</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                        <label>Visitor</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-danger">
                            <i class="icon-globe tx-danger tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_visitors->total_visitor }}</span></h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>Visitor</span>unik</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
        <!-- Transaction History Start -->
        <!--================================--> 				  
        <div class="row row-xs clearfix">
            <div class="col-xl-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Log Activity
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#transactionHistory" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="transactionHistory">
                    <ul class="list-group list-group-flush tx-13">
                        @foreach($activity_log as $log)
                        <li class="list-group-item d-flex pd-sm-x-20">
                            <div class="d-none d-sm-block"><span class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success"><i class="icon ion-checkmark"></i></span></div>
                            <div class="pd-sm-l-10">
                                <p class="tx-dark mg-b-0">{{ $log->name }}</p>
                                <span class="tx-12 mg-b-0 tx-gray-500">{{ date('d-m-Y', strtotime($log->log_created_at)) }}</span>
                            </div>
                            <div class="mg-l-auto text-right">
                                <p class="mg-b-0 tx-rubik tx-dark">{{ date('H:i:s', strtotime($log->log_created_at)) }}</p>
                                <span class="tx-12 tx-success mg-b-0">Login</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>
            <div class="col-xl-8">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Lead Magnet
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#recentEarnings" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                <div class="card-body pd-0 collapse show" id="recentEarnings">
                    <div class="row d-flex pd-t-20 pd-b-35 pd-x-15">
                        <div class="col-sm-6 col-xl-4">
                            <div class="media mg-t-20">
                                <div class="wd-40 wd-md-50 ht-40 ht-md-50 card-icon-warning mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                    <i class="icon-people tx-warning tx-20"></i>
                                </div>
                                <div>
                                    <span class="tx-uppercase tx-10 tx-gray-500">Subscriber Hari Ini</span>
                                    <h4 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_subscriber_now }} </span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="media mg-t-20">
                                <div class="wd-40 wd-md-50 ht-40 ht-md-50 card-icon-warning mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                    <i class="icon-people tx-warning tx-20"></i>
                                </div>
                                <div>
                                    <span class="tx-uppercase tx-10 tx-gray-500">Subscriber Minggu Ini</span>
                                    <h4 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_subscriber_in_week }} </span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                        <div class="media mg-t-20">
                            <div class="wd-40 wd-md-50 ht-40 ht-md-50 card-icon-warning mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                <i class="icon-people tx-warning tx-20"></i>
                            </div>
                            <div>
                                <span class="tx-uppercase tx-10 tx-gray-500">Semua Subscriber</span>
                                <h4 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_subscribers }}</span></h4>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mg-b-0">
                        <thead class="tx-dark tx-uppercase tx-bold">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Campaign</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->lp_name }}</td>
                                <td>{{ date('d-m-Y H:i', strtotime($lead->sub_created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Transaction History End -->

    </div>
    <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/countup/counterup.min.js"></script>		
<script src="{{ asset('template/metrical') }}/plugins/waypoints/waypoints.min.js"></script>
<script>
$( function() {
	$('.counter').countUp();
});
</script>
@endsection
@include('partials.footer')  