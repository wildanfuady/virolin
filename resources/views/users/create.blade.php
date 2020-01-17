@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
                <h1 class="pd-0 mg-0 tx-20">Detail User</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
                <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
                <a class="breadcrumb-item" href="">Detail User</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-50" style="margin-bottom:20%">
                <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="card-header">
                    <h4 class="card-header-title">
                        Create User
                    </h4>
                </div>
                <div class="card-body collapse show">
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
                    &nbsp;
                    &nbsp;
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')