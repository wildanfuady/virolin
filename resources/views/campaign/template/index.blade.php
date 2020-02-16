    
<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <!-- Title of Website -->
  <title>@yield('title')</title>

  <meta name="description" content="Multipurpose Landing Page with Page Builder - App Landing Page">
  <meta name="keywords" content="fibre, html theme, app landing page, app theme, app template, android app theme, ios app theme, html landing page, one page, responsive landing page">
  <meta name="author" content="Egotype">

  <!-- Favicon -->
  <link rel="icon" href="http://localhost/fibre/builder/images/favicon.png" type="image/png">
  <link rel="apple-touch-icon" href="http://localhost/fibre/builder/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://localhost/fibre/builder/images/favicon.ico" type="image/x-icon">

  <!-- Loading Styles -->
  <link href="{{ asset('landingpage/css') }}/skeleton.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic">

  <!-- Custom Styles -->
  <link href="{{ asset('landingpage/css') }}/style.css" rel="stylesheet">
  <link href="{{ asset('landingpage/css') }}/responsive.css" rel="stylesheet">

</head>
<body>
<div id="page" class="page skeleton">
@yield('content')
<!-- Back to Top Button -->
<a href="#page" class="btn-circle btn-circle-lg btn-color btn-top smooth-scroll">
  <i class="fa fa-angle-up"></i>
</a>
<!-- /End Back to Top Button -->

<!-- Scripts -->
<script src="{{ asset('landingpage/js') }}/build/build.min.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/owl.carousel.min.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/twitterFetcher_min.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/jquery.backgroundvideo.min.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/jquery.youtubebackground.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/newsletter-form.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/jquery.ajaxchimp.min.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/contact-form.js"></script>
<script src="{{ asset('landingpage/js') }}/plugins/circles.min.js"></script>

<!-- RS5.0 Core JS Files -->
<script type="text/javascript" src="{{ asset('landingpage') }}/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script type="text/javascript" src="{{ asset('landingpage') }}/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>

<script src="{{ asset('landingpage/js') }}/custom.js"></script>
<script>
$(document).ready(function() {
  
  var image = $('img').attr('src');
  var link = 'http://localhost/fibre/builder/elements/' + image;
  $('img').attr('src', link);
  // console.log(tes);
  
});
</script>

</body></html>
