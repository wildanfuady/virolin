@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/dropify/css/dropify.min.css">
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
        <div class="row no-gutters">
            <div class="pageheader pd-t-25 pd-b-35">
                <div class="pd-t-5 pd-b-5">
                    <h1 class="pd-0 mg-0 tx-20">Edit Profile</h1>
                </div>
                <div class="breadcrumb pd-0 mg-0">
                    <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i>
                        Home</a>
                    <a class="breadcrumb-item" href="{{ url('/profile') }}"><i class="icon ion-ios-home-outline"></i>
                        Profile</a>
                    <a class="breadcrumb-item" href="">Edit Profile</a>
                </div>
            </div>
            <div class="col-12">
                <div class="row no-gutters mg-b-100">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden-sm">
                        <div class="card bd-l-0-force bd-t-0-force bd-r-0-force">
                            {{ Form::open(['route' => 'profile.update', 'files' => true, 'id' => 'form_edit_profile']) }}
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
                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            {{ Form::label('name', 'Nama Lengkap') }}
                                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Nama" id="edit_profile_name">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('email', 'Email') }}
                                            <input type="text" value="{{ $user->email }}" name="email" class="form-control" placeholder="Email" id="edit_profile_email" readonly>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('gender', 'Jenis Kelamin') }}
                                            <select name="gender" class="form-control" id="edit_profile_gender">
                                                <option <?php if($user->gender == 'pria'){ echo "selected"; } ?> value="pria">Pria</option>
                                                <option <?php if($user->gender == 'wanita'){ echo "selected"; } ?> value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('phone', 'Nomor Telepon') }}
                                            <input type="number" value="{{ $user->phone }}" name="phone" class="form-control" placeholder="Telepon" id="edit_profile_phone">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('address', 'Alamat') }}
                                            <input type="text" value="{{ $user->address }}" name="address" class="form-control" placeholder="Alamat" id="edit_profile_address">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('avatar', 'Avatar') }}
                                            <small class="sidetitle">Avatar boleh dikosongkan dan menggunakan gambar default</small>
                                            {{ Form::file('image', ['class'=> 'dropify', 'data-show-loader' => 'false', 'id' => 'edit_profile_avatar']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="{{ url('profile') }}" class="btn btn-outline-info">Back</a>
                                        <button type="button" id="btn_update_profile" class="btn btn-primary float-right">Update</button>
                                    </div>
                                </div>
                                &nbsp;
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/plugins/dropify/js/dropify.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>
<script>
$(document).ready(function(){

  $('.dropify').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Remove',
      'error':   'Ooops, something wrong happended.'
    }
  });

});
</script>	
@endsection
@include('partials.footer')