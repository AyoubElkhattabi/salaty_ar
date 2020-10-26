<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <style>
        body{background:#f1f1f1;color: #444;font-size: 14px;}
        .login{background-color: white;padding:10px;border-radius: 7px;border:1px solid #ccd0d4;}
        .container{width:350px;margin:auto;}
        .lostpassword{border-left: 7px solid #007bff;}
        .headtitle{font-size: 30px; letter-spacing: 3px;}
    </style>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="main.css">
  </head>
  <body>


    <div class="container pt-5">
        @yield('content')
    </div>





    {{--Start JavaScript Files--}}
        {{--jquery--}}
        <script src="{{asset('assets/js/jquery2.min.js')}}"></script>
        {{--popperjs--}}
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        {{--bootstrap js--}}
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    {{--End JavaScript Files--}}

  </body>
</html>
