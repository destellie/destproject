<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FashionNova --{{$title}}</title>
         <!-- Bootstrap core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">
    </head>

 

</head>

<body>
    <body>
        @include('layouts/_nav')
       @yield('content')
       <footer>
       @yield('footer')
       </footer>
    </body>
    <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</html>
 