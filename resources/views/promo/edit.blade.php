@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/summernote/summernote-bs4.css">
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/dropify/css/dropify.min.css">
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
@endsection
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
                    {{ Form::model($promo, ['method' => 'PATCH','route' => ['promos.update', $promo->promo_id], 'files' => true, 'id' => 'form_edit_promo']) }}
                    <div class="card-body collapse show">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Terjadi kesalahan saat menginput data.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_title', 'Judul') }}
                                    {{ Form::text('promo_title', $promo->promo_title, ['class'=> 'form-control', 'placeholder'=> 'Judul Promo', 'id' => 'promo_title', 'autocomplete' => 'off']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_status', 'Status') }}
                                    {{ Form::select('promo_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $promo->promo_status, ['class'=> 'form-control', 'placeholder'=> 'Pilih Status', 'id' => 'promo_status', 'autocomplete' => 'off']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_start', 'Tanggal Mulai') }}
                                    <small class="sidetitle">Format: bulan/tanggal/tahun</small>
                                    <input type="date" value="{{ $promo->promo_start }}" class="form-control" placeholder="Tanggal Mulai" name="promo_start" id="promo_start" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_end', 'Tanggal Berakhir') }}
                                    <small class="sidetitle">Format: bulan/tanggal/tahun</small>
                                    <input type="date" value="{{ $promo->promo_end }}" class="form-control" placeholder="Tanggal Berakhir" name="promo_end" id="promo_end" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_code', 'Kode Promo') }}
                                    <small class="sidetitle">Maksimal 20 karakter</small>
                                    <input type="text" value="{{ $promo->promo_code }}" class="form-control" name="promo_code" maxlength="20" style="text-transform:uppercase" id="promo_code" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_percent', 'Promo %') }}
                                    <small class="sidetitle">Masukan angka tanpa menggunakan %. Persent otomatis dari sistem.</small>
                                    <input type="number" value="{{ $promo->promo_percent }}" class="form-control" name="promo_percent" placeholder="Contoh: 10" id="promo_percent" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_image', 'Gambar') }}
                                    {{ Form::file('promo_image', ['class'=> 'dropify', 'data-show-loader' => 'false', 'id' => 'promo_image', 'autocomplete' => 'off']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_content', 'Konten') }}
                                    {{ Form::textarea('promo_content', $promo->promo_content, ['class'=> 'form-control textarea', 'placeholder'=> 'Konten', 'id' => 'promo_content', 'autocomplete' => 'off']) }}
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('promos.index') }}" class="btn btn-outline-info">Back</a>
                                <button type="button" id="btn_edit_promo" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/summernote/summernote-bs4.js"></script>
<script src="{{ asset('template/metrical') }}/plugins/dropify/js/dropify.min.js"></script>
<script>
$(document).ready(function(){

    $('.textarea').summernote({
        height: 350,
    });

    $('.dropify').dropify({
        messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
        }
    });

})
</script>
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>	
@endsection
@include('partials.footer')