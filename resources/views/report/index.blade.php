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
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-50" style="margin-bottom:20%">
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
    </div>
</div>
@include('partials.footer')