<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Campaign Failed - Virolin.com</title>
    
    <link href="{{ asset('landingpage/content') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('landingpage/content') }}/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />
</head>
<body>
    <div class="banner">
        <div class="container">
            <div class="col-md-6 col-md-push-3 text-center">
                <div class="">
                    <h1 class="md22 sm30 xs25 w600 white top1 text-center">
                     Ops, ada masalah saat menginput data ...
                    </h1>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 3%">
            <div class="col-md-4 col-md-offset-4 text-center" style="background: white;border-radius: 10px">
                <div class="card" style="border-radius: 10px; padding-bottom:3%">
                {{ Form::open(['url' => $slug.'/send']) }}
                <br>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger text-left">
                            <ol>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                        </div>
                        @endif
                        <?php
                            if($msg_warning = Session::get('warning')){
                                $class = "alert alert-warning alert-dismissable";
                                $msg = $msg_warning;
                            } else {
                                $class = "d-none";
                                $msg = "";
                            }
                        ?>
                        <div class="{{ $class }}" id="alert-msg">
                            {{ $msg }}
                        </div>
                        <br>
                        <p>Masukan email dan nama Anda untuk mendapatkan link free ecouse melalui email yang kami kirimkan: </p>
                        <br>
                        <br>
                        <div class="form-group">
                            {{ Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Nama Lengkap Anda']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Aktif Anda']) }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group bonusbutton">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                Ya, Saya Mau
                            </button>
                        </div>
                        <div class="form-group" style="margin-bottom: 3%">
                            <small><i class="fa fa-lock"></i> Form ini aman. Anda dapat unsubscribe kapan saja.</small>
                        </div>
                    </div>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
	
    <div class="strip_footer clear">
        <div class="container">
            <div class=" white">
                <div class="col-md-12 col-sm-12 col-xs-12 md15 sm14 xs11 text-center">
                    Copyright &copy; 2020 | All Right Reserved | Created with <i class="fa fa-heart" style="color:red"></i> by <a href="https://virolin.com" target="_blank"> Virolin</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>