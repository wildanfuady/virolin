<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Dashboard Virolin">
      <meta name="keyword" content="Dashboard Virolin">
      <meta name="author"  content="virolin.com"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Page Title -->
      <title>Virolin Dashboard</title>
      <!-- Favicon -->	
      <link rel="icon" href="{{ asset('template/metrical') }}/images/favicon.ico" type="image/x-icon">
      <!-- Main CSS Primary -->			
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/bootstrap/css/bootstrap.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/font-awesome/css/font-awesome.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/flag-icon/flag-icon.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/simple-line-icons/css/simple-line-icons.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/ionicons/css/ionicons.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/app.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/style.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/custom.css"/>
      <!-- CSS Sekunder -->
      @yield('css')
      <!-- jQuery File -->
      <script src="{{ asset('template/metrical') }}/plugins/jquery/jquery.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/jquery-ui/jquery-ui.js"></script>
      
   </head>
   <body style="background:#f7f7fe;">
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container" style="background-color: #5d78ff">
      