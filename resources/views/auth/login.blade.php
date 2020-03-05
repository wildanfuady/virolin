<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
	  <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="">
	  <meta name="keyword" content="">
	  <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>Log In | Virolin.com</title>
      <!-- Main CSS -->			
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/bootstrap/css/bootstrap.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/font-awesome/css/font-awesome.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/simple-line-icons/css/simple-line-icons.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/ionicons/css/ionicons.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/app.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/style.min.css"/>
      <!-- Favicon -->	
      <link rel="icon" href="{{ asset('template/metrical') }}/images/favicon.ico" type="image/x-icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body style="background: orange">
      <!--================================-->
      <!-- User Singin Start -->
      <!--================================-->			
      <div class="ht-100v d-flex">
         <div class="card shadow-none pd-20 mx-auto wd-300 text-center bd-1 align-self-center"style="border-radius: 10px">
            <h4 class="card-title mt-3 text-center"><img src="{{ asset('image/logo-virolin.png') }}" class="img-fluid"></h4>
            <p class="text-center">Log in untuk mengakses data</p>
            <form method="POST" action="{{ route('login') }}">
            @csrf
               <div class="form-group input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text pd-x-9"> <i class="fa fa-envelope"></i> </span>
                  </div>
                  <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                  @error('email')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  @error('password')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group">
                  <input class="" type="checkbox" name="remember" id="remember"
                     {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                     {{ __('Remember Me') }}
                  </label>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-custom-primary btn-block tx-13 hover-white"> {{ __('Login') }} </button>
               </div>
               <p class="text-center">
               @if (Route::has('password.request'))
               <a href="{{ route('password.request') }}">
                     Lupa Password?
               </a>
               @endif
               </p>
               <p class="text-center">Don't have an account?<br/> <a href="register">Register</a> </p>
            </form>
         </div>
      </div>
      <!--/ User Singin End -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->	
      <script src="{{ asset('template/metrical') }}/plugins/jquery/jquery.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/jquery-ui/jquery-ui.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/popper/popper.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/pace/pace.min.js"></script>
      <script src="{{ asset('template/metrical') }}/js/jquery.slimscroll.min.js"></script>
      <script src="{{ asset('template/metrical') }}/js/custom.js"></script>
   </body>
</html>