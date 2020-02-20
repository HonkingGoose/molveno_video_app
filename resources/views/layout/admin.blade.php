<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        @stack('styles')
        <title>Molveno Lake Resort Video Admin App @yield('title')</title>
    </head>
    <body>



        <div id="app">
            <header>
                <h1>Video Admin application Molveno</h1>
            </header>

            <aside id="left">

            </aside>

            <main>
                @section('hello')
                <div >
                    <nav class="navbar navbar-dark bg-dark justify-content-start col-md-3" >
                        <a class="navbar-brand" href="/"><i class="fas fa-video"></i></a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                            <a class="nav-link" href="{{ route('video.index') }}">Go to Video Index</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @show
                <br>
                @section('helloOne')
                <div>
                    <nav class="navbar navbar-dark bg-dark justify-content-start col-md-3">
                        <a class="navbar-brand" href="/"><i class="fas fa-user"></i></a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                            <a class="nav-link" href="{{ route('guest.index') }}">Go to list of Guests</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @show

                @yield('content')
            </main>

            <aside id="right">

            </aside>

            <footer></footer>
        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>
