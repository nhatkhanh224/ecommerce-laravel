<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style>
  body {
    background: linear-gradient(132deg, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3, #03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3, #03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800);
    background-size: 400% 400%;
    animation: BackgroundGradient 30s ease infinite;
  }

  @keyframes BackgroundGradient {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  .baslik {
    color: #fff;
    text-align: center;
    font-family: 'Fira Sans', sans-serif;
  }

  .arkalogin {
    width: 300px;
    text-align: center;
    background: #fff;
    height: 300px;
    padding: 10px;
    margin: 50px auto;
  }

  .loginbaslik {
    color: #888888;
    text-align: left;
    font-size: 19px;
    margin-top: 15px;
  }

  .giris {
    width: 100%;
    height: 40px;
    margin-top: 10px;
    border: none;
    background: #E5E5E5;
    outline: none;
    padding: 0 10px;
  }

  .butonlogin {
    width: 100%;
    margin-top: 10px;
    height: 40px;
    font-weight: bold;
    background: #2196F3;
    border: none;
    color: #fff;
    transition: all 250ms;
  }

  .butonlogin:hover {
    background: #1E88E5;
  }

  body {
    margin: 0;
  }
  </style>
</head>

<body>
  <section style="height: 100vh;">
    <div
      style="background-image: url(images/arka.jpg); background-attachment: fixed; background-size: cover; width: 100%; height: 100vh; position: relative;">
      <div class="baslik">
        <b style="font-size: 101px; text-align: center; margin-bottom: -21px; display: block;">RINN ECOMMERCE</b>
        <span style="font-size: 19px; text-align: center; display: block; margin-bottom: 25px;">ADMİN LOGIN</span>
      </div>
      <section>
        <form method="POST" action="{{route('admin.post-login')}}">
          @csrf 
          <div class="arkalogin">
            <div class="loginbaslik">Admin Login</div>
            <hr style="border: 1px solid #ccc;">
            <input class="giris" type="email" name="email" placeholder="User">
            <input class="giris" type="password" name="password" placeholder="•••••">
            <label for="remember-me" class="text-info"><span>Remember me</span> <span>
                <input id="remember-me" name="remember_me" type="checkbox"></span></label><br>
            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">

          </div>
        </form>
      </section><br>
      <span style="font-size: 23px; text-align: center; display: block; color: #E6E6E6;
    ">Welcome To The Admin Panel</span>
      <span style="font-size: 24px; text-align: center; display: block; color: #fff; font-weight: bold; margin-bottom: 34px;
    ">LOGİN</span>

    </div>
  </section>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>