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
            <h1 class="pd-0 mg-0 tx-20">Create Role</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Create Role</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
              <div class="card-header">
                <h4 class="card-header-title">
                    Create Role
                </h4>
              </div>
              {{ Form::open(['route' => 'banks.store', 'files' => TRUE]) }}
              <div class="card-body collapse show">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            
                <div class="form-group">
                    {{ Form::label('name', 'Nama') }}
                    {{ Form::text('bank_name', '', ['class' => 'form-control', 'placeholder' => 'Nama Bank']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('code', 'Kode Bank') }}
                    {{ Form::number('bank_code', '', ['class' => 'form-control', 'placeholder' => 'Kode Bank']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('norek', 'Nomor Rekening') }}
                    {{ Form::number('bank_number', '', ['class' => 'form-control', 'placeholder' => 'Nomor Rekening']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nasabah', 'an. Nasabah') }}
                    {{ Form::text('bank_nasabah', '', ['class' => 'form-control', 'placeholder' => 'an. Nasabah']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status', 'Status') }}
                    {{ Form::select('bank_status', ['valid' => 'Valid', 'invalid' => 'Invalid'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    {{ Form::file('bank_image', ['class' => 'form-control']) }}
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ route('banks.index') }}" class="btn btn-outline-info">Back</a>
                &nbsp;
                &nbsp;
                <button type="submit" class="btn btn-primary ft-right" style="float:right">Tambah</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@include('partials.footer') 