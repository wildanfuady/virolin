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
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Detail Promo
                        </h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_title', 'Judul') }}
                                    {{ Form::text('promo_title', $promo->promo_title, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_status', 'Status') }}
                                    {{ Form::text('promo_status', $promo->promo_status, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_start', 'Tanggal Mulai') }}
                                    {{ Form::text('promo_start', date('d-m-Y', strtotime($promo->promo_start)), ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Start', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_end', 'Tanggal Berakhir') }}
                                    {{ Form::text('promo_end', date('d-m-Y', strtotime($promo->promo_end)), ['class'=> 'form-control', 'placeholder'=> 'Enter Promo End', 'readonly']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_code', 'Kode Promo') }}
                                    <input type="text" value="{{ $promo->promo_code }}" class="form-control" name="promo_code" maxlength="20" style="text-transform:uppercase" readonly>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_percent', 'Promo %') }}
                                    <input type="number" value="{{ $promo->promo_percent }}" class="form-control" name="promo_percent" placeholder="Contoh: 10" readonly>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_end', 'Gambar') }}
                                    <br>
                                    <img src="{{ asset('storage/'.$promo->promo_image) }}" alt="{{ $promo->promo_title }}" width="50%">
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_content', 'Konten') }}
                                    <hr>
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