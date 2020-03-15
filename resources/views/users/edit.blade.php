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
                {{ Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]) }}
                <div class="card-header">
                    <h4 class="card-header-title">
                        Edit Data User
                    </h4>
                </div>
                <div class="card-body collapse show">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Terjadi kesalahan saat menginput data.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap', 'autocomplete' => 'off', 'autosave' => 'false']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'autocomplete' => 'off', 'autosave' => 'false']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete = "off" autosave = "false">
                            <span style="color: red; font-style: italic">Kosongkan password jika tidak ingin mengubah data</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            {{ Form::select('product_id', $products, $user->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'autocomplete' => 'off', 'autosave' => 'false']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            {{ Form::select('status', ['valid' => 'Valid', 'invalid' => 'Invalid'], $user->status, ['class' => 'form-control', 'placeholder' => 'Choose One', 'autocomplete' => 'off', 'autosave' => 'false']) }}  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            {{ Form::select('roles[]', $roles, [], array('class' => 'form-control', 'multiple')) }}
                            <span style="color: red; font-style: italic">Kosongkan role jika tidak ingin mengubah data</span>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-info">Back</a>
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