@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="card-header">
                Create Customer
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
            
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama User']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        {{ Form::select('product_id', $products, $user->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        {{ Form::select('status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], $user->status, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}  
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ubah Masa Aktif</label>
                    <div class="col-sm-10">
                        <div class="icheck-success d-inline">
                            {{ Form::radio('masa_aktif', 'Tidak', false, array('class' => 'name', 'id' => "radioSuccess1", 'checked')) }}
                            <label for="radioSuccess1">
                                Tidak
                            </label>
                        </div>
                        <div class="icheck-success d-inline">
                            {{ Form::radio('masa_aktif', 'Ya', false, array('class' => 'name', 'id' => "radioSuccess2")) }}
                            <label for="radioSuccess2">
                                Ya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
