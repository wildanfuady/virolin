@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Banks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Banks</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            {{ Form::open(['route' => 'banks.store', 'files' => TRUE]) }}
            <div class="card-header">
                Create Bank
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
