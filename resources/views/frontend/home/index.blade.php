<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>DriveNow</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('frontend') }}/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/{{ asset('frontend') }}/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('frontend') }}/images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
     @include('frontend.partials.header')
     
      <!-- banner -->
      @include('frontend.partials.banner')

      <!-- end banner -->
      <!-- about -->
      @include('frontend.partials.about')

     
      <!-- end about -->
      <!-- our_room -->
      @include('frontend.partials.cars')

      
      <!-- end our_room -->
      <!-- gallery -->

      <!-- end gallery -->
   
      <!--  contact -->
      @include('frontend.partials.contact')
      <!-- end contact -->
      <!--  footer -->
      @include('frontend.partials.footer')

      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
      <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('frontend') }}/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="{{ asset('frontend') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{ asset('frontend') }}/js/custom.js"></script>
   </body>
</html>