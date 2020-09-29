<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fashionnova') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/jquery.min.js') }}" rel="stylesheet"></script>
    <script src="{{ asset('js/popper.min.js') }}" rel="stylesheet"></script>
     <script src="{{asset('js/bootstrap.min.js')}}" rel="stylesheet"></script>
     <script src="{{asset('js/bootstrap.min.js')}}" rel="stylesheet"></script>
   <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Dashbaord') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">My Orders</a>
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="#">My Profile</a>
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    
                    @can('manage-users')
                    <li class="nav-item active">
                    <a class="nav-link" href="{{url('/list_items ')}}">Items</a>
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">List of Users</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('categories/list_cat ')}}">Pages</a>
                    </li>
                    @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <img src="{{asset(Auth::user()->image)}}" style="height:45px; width:60px; border-radius:50%; margin-right:15px;" alt="">  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('manage-users')
                                    
                                    
                                    <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('List of users') }}</a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
   
   
     
   
</body>
</html>


