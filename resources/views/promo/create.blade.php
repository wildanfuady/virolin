@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/summernote/summernote-bs4.css">
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/dropify/css/dropify.min.css">
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
            <h1 class="pd-0 mg-0 tx-20">Tambah Promo</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Tambah Promo</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Tambah Data Promo
                        </h4>
                    </div>
                    {{ Form::open(['route' => 'promos.store', 'files' => true]) }}
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
                                    {{ Form::text('promo_title', '', ['class'=> 'form-control', 'placeholder'=> 'Judul Promo']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_status', 'Status') }}
                                    {{ Form::select('promo_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class'=> 'form-control', 'placeholder'=> 'Pilih Status']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_start', 'Tanggal Mulai') }}
                                    <small class="sidetitle">Format: bulan/tanggal/tahun</small>
                                    <input type="date" value="{{ old('promo_start') }}" class="form-control" placeholder="Tanggal Mulai" name="promo_start">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_end', 'Tanggal Berakhir') }}
                                    <small class="sidetitle">Format: bulan/tanggal/tahun</small>
                                    <input type="date" value="{{ old('promo_end') }}" class="form-control" placeholder="Tanggal Akhir" name="promo_end">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_code', 'Kode Promo') }}
                                    <small class="sidetitle">Maksimal 20 karakter</small>
                                    <input type="text" value="{{ old('promo_code') }}" class="form-control" name="promo_code" maxlength="20" style="text-transform:uppercase">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_percent', 'Promo %') }}
                                    <small class="sidetitle">Masukan angka tanpa menggunakan %. Persent otomatis dari sistem.</small>
                                    <input type="number" value="{{ old('promo_percent') }}" class="form-control" name="promo_percent" placeholder="Contoh: 10">
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_image', 'Judul') }}
                                    {{ Form::file('promo_image', ['class'=> 'dropify', 'data-show-loader' => 'false']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_content', 'Konten') }}
                                    {{ Form::textarea('promo_content', '', ['class'=> 'form-control textarea', 'placeholder'=> 'Konten Promo', 'rows'=> 10]) }}
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
  $('.dropify').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Remove',
      'error':   'Ooops, something wrong happended.'
    }
  });
    $('.textarea').summernote({
        height: 350,
        followingToolbar: false
    });
})
</script>
@endsection
@include('partials.footer')