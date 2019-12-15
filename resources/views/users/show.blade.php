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
            <div class="card-header">
                Show User
            </div>
            <div class="card-body">
            
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama User', 'disabled']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'disabled']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        {{ Form::select('product_id', $products, $user->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        {{ Form::select('status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], $user->status, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled']) }}  
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-outline-info">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
