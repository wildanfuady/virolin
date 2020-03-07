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

            @if(count($promo) > 0)

                @foreach($promo as $item)
                <div class="card-columns">
                    <div class="card mg-15" style="height: 300px">
                        <a href="{{ url('promo/detail/'. $item->promo_id) }}">
                        <img src="{{ asset('storage/'.$item->promo_image) }}" class="card-img-top img-fluid wd-100p" alt="{{ $item->promo_title }}" style="height: 150px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->promo_title }}</h5>
                            <p class="card-text">
                                <p><i class="fa fa-calendar"></i> Tanggal Mulai: {{ date('d-m-Y', strtotime($item->promo_start)) }}</p>
                                <p><i class="fa fa-calendar"></i> Tanggal Akhir: {{ date('d-m-Y', strtotime($item->promo_end)) }}</p>
                            </p>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-md-12">
                <div class="alert alert-danger">
                    Belum ada promo saat ini ...
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12 mg-15">
                    {{ $promo->links() }}
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