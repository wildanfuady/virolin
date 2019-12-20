@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Payments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            {{ Form::open(['url' => 'konfirmasi-pembayaran/store', 'files' => true]) }}
            <div class="card-header">
                Konfirmasi Pembayaran
            </div>
            <div class="card-body">
                <?php
                    if($msg_success = Session::get('success')){
                        $class = "alert alert-success alert-dismissable";
                        $msg = $msg_success;
                    } else if($msg_success = Session::get('error')){
                        $class = "alert alert-danger alert-dismissable";
                        $msg = $msg_success;
                    } else {
                        $class = "d-none";
                        $msg = "";
                    }
                ?>
                <div class="{{ $class }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $msg }}
                </div>
                <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Detail Pembayaran</h5>
                    Anda dapat melihat detail pembayaran <a href="{{ url('payment/detail/'.Auth::user()->id) }}">di sini</a>.
                </div>
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
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('invoice', 'Invoice') }}
                            {{ Form::number('invoice', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Enter Invoice']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('pengirim', 'Pengirim') }}
                            {{ Form::text('pengirim', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Enter Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('bank', 'Transfer ke Bank') }}
                            {{ Form::select('bank', $banks, null, ['class'=> 'form-control border-none', 'placeholder'=> 'Choose One']) }}
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('jumlah_transfer', 'Jumlah Transfer') }}
                            {{ Form::number('jumlah_transfer', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Rp. ']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('tanggal_transfer', 'Tanggal Transfer') }}
                            {{ Form::date('tanggal_transfer', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Rp. ']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('bukti_transfer', 'Bukti Transfer') }}
                            {{ Form::file('bukti_transfer', ['class'=> 'form-control border-none', 'style' => 'border-bottom:0']) }}
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{ url('home') }}" class="btn btn-outline-info">Back</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
