<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <title>@yield('head-title', 'Laravel BoolBnB')</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('cdn')
</head>
<body>
    @yield('body-start')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest((Route::currentRouteName() == 'guest.recipes.index'))
                            
                        
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('guest.apartments.index') }}">Apartments</a>
                            </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            

                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>  
                        @else
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.apartments.index') }}">Apartments</a>
                            </li> --}}
                        @if ((Route::currentRouteName() == 'admin.my_apartments.index'))
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.my_apartments.index') }}">My apartment</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.my_apartments.create') }}">New apartment</a>
                            </li>
                        @endif
                        @if ((Route::currentRouteName() == 'admin.my_apartments.show'))
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.apartments.edit') }}">Edit your apartment</a>
                            </li> --}}
                        @endif
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.apartments.deleted') }}">Destroy your apartment</a>
                            </li>  --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                   
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        @yield('scripts')
    </div>
</body>
</html>
