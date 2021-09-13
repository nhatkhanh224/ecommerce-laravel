<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  @yield('title')
  <link href="{{asset('Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
  <link href="{{asset('Eshopper/css/price-range.css')}}" rel="stylesheet">
  <link href="{{asset('Eshopper/css/animate.css')}}" rel="stylesheet">
  <link href="{{asset('Eshopper/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('Eshopper/css/responsive.css')}}" rel="stylesheet">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="{{asset('Eshopper/images/ico/apple-touch-icon-144-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="{{asset('Eshopper/images/ico/apple-touch-icon-114-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="{{asset('Eshopper/images/ico/apple-touch-icon-72-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" href="{{asset('Eshopper/images/ico/apple-touch-icon-57-precomposed.png')}}">
  <link rel="stylesheet" href="{{asset('owlcarousel/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('owlcarousel/dist/assets/owl.theme.default.min.css')}}">

</head>
<!--/head-->

<body>
  @include('home.components.header')

  @yield('content')

  @include('home.components.footer')



  <script src="{{asset('Eshopper/js/jquery.js')}}"></script>
  <script src="{{asset('Eshopper/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('Eshopper/js/jquery.scrollUp.min.js')}}"></script>
  <script src="{{asset('Eshopper/js/price-range.js')}}"></script>
  <script src="{{asset('Eshopper/js/jquery.prettyPhoto.js')}}"></script>
  <script src="{{asset('Eshopper/js/main.js')}}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="{{asset('owlcarousel/dist/owl.carousel.js')}}"></script>
  <script>
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 3,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true
  });
  </script>

</body>

</html>