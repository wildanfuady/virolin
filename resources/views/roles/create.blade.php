@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Roles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Create a New Role
            </div>
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                
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
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            <br/>
                            <div class="form-group clearfix">
                            <div class="row">
                            @foreach($permission as $value)
                            <div class="col-md-3 mb-3">
                                <div class="icheck-success d-inline">
                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name', 'id' => "checkboxSuccess".$value->id)) }}
                                    <label for="checkboxSuccess<?= $value->id ?>">
                                        <?= $value->name ?>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ url('roles') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection 