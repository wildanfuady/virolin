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
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
