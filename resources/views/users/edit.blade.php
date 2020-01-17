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
                <h1 class="pd-0 mg-0 tx-20">Edit User</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
                <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
                <a class="breadcrumb-item" href="">Edit User</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-50" style="margin-bottom:20%">
                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="card-header">
                    <h4 class="card-header-title">
                        Edit User
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
                    &nbsp;
                    &nbsp;
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('partials.footer')