<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link href="{{ asset('css/admin_layout.css') }}" rel="stylesheet">
        <title>{{ config('admin.name', 'Admin') }}</title>



        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    </head>
    <body>

        <header id="middle">
            <h1>Admin Molveno</h1>
        </header>



            <div class="app">

                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    @auth
                    <div class="container" id="middleTwo">



                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav" class="navbar-nav mr-auto">

                                    {{-- <li class="active"><a href="/admin">Home</a></li> --}}
                                    <li><a href="{{ route('video.index') }}">Video index</a></li>
                                    <li><a href="{{ route('guest.index') }}">Guest index</a></li>
                                    <li><a href="{{ route('guest.room.set') }}">Set roomnumber</a></li>
                                    <li><a href="/logout">Log out</a></li>
                                 <!-- Authentication Links -->

                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li> --}}

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('registerAccount') }}">{{ __('Register') }}</a>
                                        </li>

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            @if(Auth::check())
                                            {{ Auth::user()->name }}

                                            @endif
                                            <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

                            </ul>

                            {{-- <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">

                            </ul> --}}
                        </div>
                    </div>
                @endauth
                </nav>

                <main class="py-4">
                    @yield('content')
                </main>
            </div>




            @yield('contentTwo')


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            @stack('scripts')

            <script type="text/javascript">
              $(function(){
                    $('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
                    $('.nav a').click(function(){
                        $(this).parent().addClass('active').siblings().removeClass('active')
                    })
                })
            </script>
    </body>

</html>
