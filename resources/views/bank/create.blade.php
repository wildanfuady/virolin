@section('css')
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
            <h1 class="pd-0 mg-0 tx-20">Tambah Bank</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Tambah Bank</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
              <div class="card-header">
                <h4 class="card-header-title">
                    Tambah Data Bank Baru
                </h4>
              </div>
              {{ Form::open(['route' => 'banks.store', 'files' => TRUE]) }}
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
            
                <div class="form-group">
                    {{ Form::label('name', 'Nama') }}
                    {{ Form::text('bank_name', '', ['class' => 'form-control', 'placeholder' => 'Nama Bank', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('code', 'Kode Bank') }}
                    {{ Form::number('bank_code', '', ['class' => 'form-control', 'placeholder' => 'Kode Bank', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('norek', 'Nomor Rekening') }}
                    {{ Form::number('bank_number', '', ['class' => 'form-control', 'placeholder' => 'Nomor Rekening', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nasabah', 'An. Nasabah') }}
                    {{ Form::text('bank_nasabah', '', ['class' => 'form-control', 'placeholder' => 'An. Nasabah', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status', 'Status') }}
                    {{ Form::select('bank_status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    {{ Form::file('bank_image', ['class'=> 'dropify', 'data-show-loader' => 'false']) }}
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ route('banks.index') }}" class="btn btn-outline-info">Back</a>
                &nbsp;
                &nbsp;
                <button type="submit" class="btn btn-primary ft-right">Tambah</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@section('js')
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
});
</script>
@endsection
@include('partials.footer') 