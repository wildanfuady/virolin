@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Customers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('users.store') }}" method="POST">
            {{ csrf_field() }}
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
                        <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Nama" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" value="{{ old('password') }}" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        <select name="product_id" class="form-control" id="">
                            @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control" id="">
                            <option value="valid">Valid</option>
                            <option value="invalid">invalid</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Masa Aktif</label>
                    <div class="col-sm-10">
                        <input type="date" value="{{ old('masa_aktif') }}" class="form-control" placeholder="" name="masa_aktif">
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
