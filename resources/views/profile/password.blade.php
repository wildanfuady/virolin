@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="row no-gutters">
            <div class="pageheader pd-t-25 pd-b-35">
                <div class="pd-t-5 pd-b-5">
                    <h1 class="pd-0 mg-0 tx-20">Edit Password</h1>
                </div>
                <div class="breadcrumb pd-0 mg-0">
                    <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i>
                        Home</a>
                    <a class="breadcrumb-item" href="{{ url('/profile') }}"><i class="icon ion-ios-home-outline"></i>
                        Profile</a>
                    <a class="breadcrumb-item" href="">Edit Password</a>
                </div>
            </div>
            <div class="col-12">
                <div class="row no-gutters mg-b-20">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden-sm">
                        <div class="card bd-l-0-force bd-t-0-force bd-r-0-force">
                            {{ Form::open(['route' => 'profile.pass_update', 'files' => true]) }}
                            <div class="card-body pd-b-0">
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
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            {{ Form::label('password_new', 'Password Baru') }}
                                            <input type="password" value="{{ old('password_new') }}" name="password_new" class="form-control" placeholder="Password Baru" id="">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('password_re', 'Konfirmasi Password Baru') }}
                                            <input type="password" value="{{ old('password_re') }}" name="password_re" class="form-control" placeholder="Masukan Kemabali Password Baru" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
