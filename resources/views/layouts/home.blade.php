<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="stylesheet" href="{{asset('Tiki/assets/font/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/base.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/grid.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/responsive.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/cart.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/page-search.css')}}">
  <link rel="stylesheet" href="{{asset('Tiki/assets/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  @yield('css')
  <title>Tiki</title>
</head>

<body>
  <div class="main">
    <?php 
            use Illuminate\Support\Facades\Auth;
            use App\Cart;
            $user = Auth::user();
            $name=$user->name;
            $count_cart=0;
            $cart=Cart::where('username',Auth::user()->email)->get();
            foreach ($cart as $cart){
                $count_cart+=$cart->quantity;
            }
        ?>
    @include('home.components.header', ['name' => $name,'count_cart' => $count_cart])
    @yield('content')
    @include('home.components.footer')
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{asset('Tiki/assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('Tiki/assets/js/script.js')}}"></script>
  <script src="{{asset('Tiki/assets/js/slider.js')}}"></script>
  <script src="{{asset('Tiki/assets/js/search-page.js')}}"></script>
  @yield('js')
</body>

</html>