@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Promo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Promo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
        {{ Form::model($promo, ['method' => 'PATCH','route' => ['promos.update', $promo->promo_id], 'files' => 'TRUE']) }}
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('promo_title', 'Title') }}
                            {{ Form::text('promo_title', $promo->promo_title, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_status', 'Status') }}
                            {{ Form::select('promo_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $promo->promo_status, ['class'=> 'form-control', 'placeholder'=> 'Choose One']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_start', 'Start') }}
                            {{ Form::text('promo_start', $promo->promo_start, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Start']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_end', 'End') }}
                            {{ Form::text('promo_end', $promo->promo_end, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo End']) }}
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('promo_content', 'Content') }}
                            {{ Form::textarea('promo_content', $promo->promo_content, ['class'=> 'form-control textarea', 'placeholder'=> 'Enter Promo Content']) }}
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
