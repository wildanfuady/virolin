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
            <h1 class="pd-0 mg-0 tx-20">Detail Promo</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Detail Promo</a>
            </div>
        </div>

        <div class="row mg-b-20 pd-20 no-gutters bg-white clearfix">
            <div class="col-md-12 mg-15">
                <span class="tx-20">Detail Promo {{ $promo->promo_title }}</span>
            </div>
                <div class="col-md-8">
                    <div class="card">
                        <img src="{{ asset('storage/'.$promo->promo_image) }}" class="card-img-top img-fluid wd-100p" alt="{{ $promo->promo_title }}">
                        <div class="card-body">
                            <small><i class="fa fa-user"></i> Admin</small>
                            <small><i class="fa fa-calendar"></i> Start: {{ date('d-m-Y', strtotime($promo->promo_start)) }}</small>
                            <small><i class="fa fa-calendar"></i> End: {{ date('d-m-Y', strtotime($promo->promo_end)) }}</small>
                            <h5 class="card-title">{{ $promo->promo_title }}</h5>
                            <p class="card-text">{{ $promo->promo_content }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 style="padding-left:20px;">Promo Lainnya</h4>
                    <hr style="padding-left:20px;">
                    <ul style="font-size: 14pt">
                        @foreach($detail_promo as $item)
                        <li><a href="{{ url('promo/detail/'.$item->promo_id) }}" style="color: #8392a5;">{{ $item->promo_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
</div>

@include('partials.footer')