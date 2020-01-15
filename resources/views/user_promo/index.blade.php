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
            <h1 class="pd-0 mg-0 tx-20">Promo</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Promo</a>
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
                        Promo
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                <div class="card-body mt-2 pd-b-20 collapse show" id="collapse3">
    
                    <table class="table table-hover table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Promo</th>
                                <th>Deskripsi</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-light btn-sm" href="#"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->
@include('partials.footer')  