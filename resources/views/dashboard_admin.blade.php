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
        <!-- Count Card Start -->
        <!--================================-->
        <div class="row row-xs clearfix">

            <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                        <label>Total Users</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                            <i class="icon-people tx-warning tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $total_users }}</span></h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>User</span>aktif</div>
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
                        <label>Share</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                            <i class="icon-handbag tx-primary tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">$<span class="counter">4,900</span><small class="tx-15">.50</small></h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>+350</span>avg. sales</div>
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
                            <i class="icon-speedometer tx-danger tx-20"></i>
                        </div>
                        <div>
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">$<span class="counter">9,900</span><small class="tx-15">.50</small></h2>
                            <div class="d-flex align-items-center tx-gray-500"><span class="text-danger mr-2 d-flex align-items-center"><i class="ion-android-arrow-down mr-1"></i>+130</span>avg. sales</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
        <!--/ Count Card End -->
        <div class="row row-xs clearfix">
            <!--================================-->
            <!--  Annual Report Start-->
            <!--================================-->
            <div class="col-lg-12 col-xl-8 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Annual Reports
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="annualReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 mg-y-20">
                            
                            <span class="tx-uppercase tx-10 mg-b-10">User Aktif</span>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$users_aktif}}</span></h3>

                            <p class="mg-t-10 mg-b-0 tx-12 tx-gray-600">Terdapat {{$users_aktif}} user aktif saat ini. <a href="{{ route('users.index') }}">Lihat Selangkapnya</a></p>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mg-y-20">

                            <span class="tx-uppercase tx-10 mg-b-10">User Expired</span>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$users_kadaluarsa}}</span></h3>

                            <p class="mg-t-10 mg-b-0 tx-12 tx-gray-600">Terdapat {{$users_kadaluarsa}} user expired saat ini. <a href="{{ route('users.index') }}">Lihat Selangkapnya</a></p>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mg-y-20">

                            <span class="tx-uppercase tx-10 mg-b-10">User Non Aktif</span>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$users_nonaktif}}</span></h3>
                            
                            <p class="mg-t-10 mg-b-0 tx-12 tx-gray-600">Terdapat user non aktif saat ini. <a href="{{ route('users.index') }}">Lihat Selangkapnya</a></p>

                        </div>
                        </div>
                        <div class="d-block clearfix">
                        <canvas id="annualReport"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- / Annual Report End -->
            <!--================================-->
        </div>
        @else 
        <div class="row row-xs clearfix">
            <!--================================-->
            <!--  Annual Report Start-->
            <!--================================-->
            <div class="col-lg-12 col-xl-8 col-12">
            <div class="card mg-b-20">
                <div class="card-body pd-t-0 pd-b-20">
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
            <!-- / Annual Report End -->
            <!--================================-->
        </div>
        @endif

    </div>
    <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->

<!-- Chart -->
<script>
$(function(){
    $(document).ready(function(){
        var a = document.getElementById("annualReport");
        new Chart(a,{
            type:"line",
            data: {
                labels:["Jan","Feb","Mar","Apr","May","Jun"],
                datasets:[
                    {
                        label:"User Aktif",
                        data:[5,15,5,20,15,25],
                        backgroundColor:"rgba(0, 204, 204, .2)",
                        borderWidth:1,
                        fill:true
                    },
                    {
                        label:"User Expired",
                        data:[10,10,15,5,20,15],
                        backgroundColor:"rgba(248, 127, 186, .2)",
                        borderWidth:1,fill:true
                    },
                    {
                        label:"User Non Aktif",
                        data:[15,5,15,10,25,20],
                        backgroundColor:"rgba(152, 194, 252, .2)",
                        borderWidth:1,
                        fill:true
                    }
                ]
            },
            options:{
                legend: {
                    display:true,
                    labels: {
                        display:true,
                        fontFamily:"IBM Plex Sans, sans-serif",
                        fontColor:"#8392a5",
                    }
                },
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero:true,
                                fontSize:11,
                                fontFamily:"IBM Plex Sans, sans-serif",fontColor:"#8392a5",
                                max:25
                            }
                        }
                    ],
                    xAxes: [
                        {
                            ticks: {
                                beginAtZero:true,
                                fontSize:11,
                                fontFamily:"IBM Plex Sans, sans-serif",fontColor:"#8392a5",
                            }
                        }
                    ]
                }
            }
        });
    });
});
</script>
@include('partials.footer')  