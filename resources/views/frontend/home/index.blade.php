<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <!-- FontAwesome -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- Fancybox -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- jQuery UI -->
      <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
   </head>
   
   <!-- body -->
   <body class="main-layout">
      <!-- loader -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('frontend') }}/images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->

      <!-- content -->
      @yield('content')

      <!-- footer -->
     

      <!-- Javascript files-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
         window.jQuery || document.write('<script src="{{ asset('frontend') }}/js/jquery.min.js">\x3C/script>');
      </script>

      <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('frontend') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{ asset('frontend') }}/js/custom.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      @yield('script')
   </body>
</html>
