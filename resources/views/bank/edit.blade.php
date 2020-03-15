@section('css')
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
            <h1 class="pd-0 mg-0 tx-20">Edit Bank</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Edit Bank</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-100">
              <div class="card-header">
                <h4 class="card-header-title">
                    Edit Data Bank
                </h4>
              </div>
              {{ Form::model($bank, ['method' => 'PATCH','route' => ['bank.update', $bank->id], 'files' => TRUE, 'id' => 'form_edit_bank']) }}
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
                    {{ Form::text('bank_name', $bank->bank_name, ['class' => 'form-control', 'placeholder' => 'Nama Bank', 'autocomplete' => 'off', 'id' => 'bank_name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('code', 'Kode Bank') }}
                    {{ Form::number('bank_code', $bank->bank_code, ['class' => 'form-control', 'placeholder' => 'Kode Bank', 'autocomplete' => 'off', 'id' => 'bank_code']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('norek', 'Nomor Rekening') }}
                    {{ Form::number('bank_number', $bank->bank_rekening, ['class' => 'form-control', 'placeholder' => 'Nomor Rekening', 'autocomplete' => 'off', 'id' => 'bank_number']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nasabah', 'An. Nasabah') }}
                    {{ Form::text('bank_nasabah', $bank->bank_nasabah, ['class' => 'form-control', 'placeholder' => 'An. Nasabah', 'autocomplete' => 'off', 'id' => 'bank_nasabah']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status', 'Status') }}
                    {{ Form::select('bank_status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], $bank->bank_status, ['class' => 'form-control', 'placeholder' => 'Choose one', 'id' => 'bank_status']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    <br>
                    <img src="{{ asset('storage/'.$bank->bank_image) }}" alt="" width="100px">
                    <br>
                    <br>
                    {{ Form::label('image', 'Ganti Image') }}
                    <br>
                    <span style="font-style: italic; color: red">Kosongkan jika tidak ingin mengubah gambar.</span>
                    {{ Form::file('bank_image', ['class'=> 'dropify', 'data-show-loader' => 'false']) }}
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('bank.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="button" id="btn_edit_bank" class="btn btn-primary float-right">Update</button>
                    </div>
                </div>
                
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
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>	
@endsection
@include('partials.footer')