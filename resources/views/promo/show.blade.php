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

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Detail Promo
                        </h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_title', 'Title') }}
                                    {{ Form::text('promo_title', $promo->promo_title, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_status', 'Status') }}
                                    {{ Form::text('promo_status', $promo->promo_status, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_start', 'Start') }}
                                    {{ Form::text('promo_start', $promo->promo_start, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Start', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_end', 'End') }}
                                    {{ Form::text('promo_end', $promo->promo_end, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo End', 'readonly']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_content', 'Content') }}
                                    <br>
                                    <?php echo "$promo->promo_content"; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')