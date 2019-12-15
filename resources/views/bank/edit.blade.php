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
            {{ Form::model($bank, ['method' => 'PATCH','route' => ['banks.update', $bank->id], 'files' => TRUE]) }}
            <div class="card-header">
                Edit Bank
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
                    {{ Form::text('bank_name', $bank->bank_name, ['class' => 'form-control', 'placeholder' => 'Nama Bank']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('code', 'Kode Bank') }}
                    {{ Form::number('bank_code', $bank->bank_code, ['class' => 'form-control', 'placeholder' => 'Kode Bank']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('norek', 'Nomor Rekening') }}
                    {{ Form::number('bank_number', $bank->bank_rekening, ['class' => 'form-control', 'placeholder' => 'Nomor Rekening']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nasabah', 'an. Nasabah') }}
                    {{ Form::text('bank_nasabah', $bank->bank_nasabah, ['class' => 'form-control', 'placeholder' => 'an. Nasabah']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status', 'Status') }}
                    {{ Form::select('bank_status', ['valid' => 'Valid', 'invalid' => 'Invalid'], $bank->bank_status, ['class' => 'form-control', 'placeholder' => 'Choose one']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    <br>
                    <img src="{{ asset('storage/'.$bank->bank_image) }}" alt="" width="100px">
                    <br>
                    {{ Form::label('image', 'Ganti Image') }}
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
