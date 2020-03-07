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
                <h1 class="pd-0 mg-0 tx-20">Semua Promo</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
                <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
                <a class="breadcrumb-item" href="">Promo</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            List Data Promo
                        </h4>
                    </div>
                    <div class="card-body collapse show">

                        <div class="card-columns">

                            @foreach($promo as $item)
                            <div class="card mg-15">
                                <a href="{{ url('promo/detail/'. $item->promo_id) }}">
                                <img src="{{ asset('storage/'.$item->promo_image) }}" class="card-img-top img-fluid wd-100p" alt="{{ $item->promo_title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->promo_title }}</h5>
                                    <p class="card-text">{{ substr($item->promo_content, 0, 20) }}</small></p>
                                </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-md-12 mg-15">
                                {{ $promo->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        $("#search").keypress(function(event){
            if(event.keyCode == 13) { // kode enter
                filter();
            }
        });

        $("#btn-search").click(function(event){
            filter();
        });

        var filter = function(){
            var keyword = $("#search").val();
            console.log(keyword);

            window.location.replace("{{ route('promos.index') }}?keyword=" + keyword);
        }
    });

    </script>

@include('partials.footer')