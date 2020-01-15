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
      <title>Virolin Dashboard</title>
      <!-- Main CSS -->			
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/bootstrap/css/bootstrap.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/font-awesome/css/font-awesome.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/flag-icon/flag-icon.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/simple-line-icons/css/simple-line-icons.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/ionicons/css/ionicons.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/steps/jquery.steps.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/toastr/toastr.min.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/chartist/chartist.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/apex-chart/apexcharts.css">
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/app.min.css"/>
      <link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/css/style.min.css"/>
      <!-- Favicon -->	
      <link rel="icon" href="{{ asset('template/metrical') }}/images/favicon.ico" type="image/x-icon">
      <!-- Midtrans -->
      <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
      
      <script src="{{ asset('template/metrical') }}/plugins/jquery/jquery.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/jquery-ui/jquery-ui.js"></script>
      
   </head>
   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
      