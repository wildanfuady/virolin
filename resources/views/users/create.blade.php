@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
@endsection
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
                <h1 class="pd-0 mg-0 tx-20">Tambah User</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
                <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
                <a class="breadcrumb-item" href="">Tambah User</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    {{ Form::open(['route' => 'user.store', 'files' => true, 'id' => 'form_create_user']) }}
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Tambah Data User
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
                                {{ Form::text('name', '', ['class'=> 'form-control', 'placeholder'=> 'Nama Lengkap', 'id' => 'user_name', 'autocomplete' => 'off']) }}  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                {{ Form::email('email', '', ['class'=> 'form-control', 'placeholder'=> 'Email', 'id' => 'user_email', 'autocomplete' => 'off', 'type' => 'email']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                 {{ Form::password('password', ['class'=> 'form-control', 'placeholder'=> 'Password', 'id' => 'user_password', 'autocomplete' => 'off', 'type' => 'password']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Produk</label>
                            <div class="col-sm-10">
                                <select name="product_id" class="form-control" id="">
                                    @foreach ($produk as $item)
                                        <option value="{{$item->product_id}}">{{ $item->product_name." - ".$item->product_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                {{ Form::select('status', ['Pending' => 'Pending', 'Success' => 'Success', 'Expired' => 'Expired'], null, ['class'=> 'form-control', 'placeholder'=> 'Pilih Status', 'id' => 'status', 'autocomplete' => 'off']) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">Role</label>
                            <span class="sidetitle">Kosongkan role jika tidak ingin menambahkan data.</span>
                                {{ Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) }}
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('user.index') }}" class="btn btn-outline-info">Back</a>
                                <button type="submit" id="btn_create_user" class="btn btn-primary float-right">Tambah</button>
                            </div>
                        </div>
                        
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>	
@endsection
@include('partials.footer')