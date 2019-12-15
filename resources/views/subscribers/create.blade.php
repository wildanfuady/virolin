@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create subscriber</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">subscribers</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
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
                <form action="{{route('subscribers.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">subscriber Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ old('subscriber_name') }}" placeholder="subscriber Name" name="subscriber_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">subscriber Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" value="{{ old('subscriber_email') }}" name="subscriber_email" placeholder="subcsriber Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">subscriber No Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ old('subscriber_nohp') }}" placeholder="subscriber No Hp" name="subscriber_nohp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">subscriber Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ old('subscriber_alamat') }}" placeholder="subscriber Alamat" name="subscriber_alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="subscriber_status" class="form-control" id="">
                                <option value="valid">Valid</option>
                                <option value="invalid">invalid</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control" id="">
                                @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Landing Page Id</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('lp_id') }}" class="form-control" placeholder="Landing Page" name="lp_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
