@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Promo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Promo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            {{ Form::open(['route' => 'promos.store']) }}
            <div class="card-header">
                <i class="fa fa-plus"></i> Create New a Promo
            </div>
            <div class="card-body">
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
                            {{ Form::label('promo_title', 'Title') }}
                            {{ Form::text('promo_title', '', ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_status', 'Status') }}
                            {{ Form::select('promo_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class'=> 'form-control', 'placeholder'=> 'Choose One']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_start', 'Start') }}
                            {{ Form::text('promo_start', '', ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Start']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_end', 'End') }}
                            {{ Form::text('promo_end', '', ['class'=> 'form-control', 'placeholder'=> 'Enter Promo End']) }}
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('promo_content', 'Content') }}
                            {{ Form::textarea('promo_content', '', ['class'=> 'form-control textarea', 'placeholder'=> 'Enter Promo Content', 'rows'=> 10]) }}
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
