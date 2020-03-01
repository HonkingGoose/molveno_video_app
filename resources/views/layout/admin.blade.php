<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link href="{{ asset('css/admin_layout.css') }}" rel="stylesheet">
        <title>Admin Molveno @yield('title')</title>
    </head>
    <body>

        <header>
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;Admin Molveno</h1>
        </header>

            <ul >
                <li class="active"><a href="/admin">Home</a></li>
                <li><a href="{{ route('video.index') }}">Video index</a></li>
                <li><a href="{{ route('guest.index') }}">Guest index</a></li>
                <li><a href="/logout">Log out</a></li>
            </ul>

            @yield('content')


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            @stack('scripts')

            <script type="text/javascript">
                // $('li a').click(function(){
                //     $('li a').css("background-color", "");
                //     $(this).css("background-color", "green");
                // });
                $('li a').click(function(){
                    $('a').parent().removeClass('active');
                    $(this).parent().addClass('active');
                    });​
            </script>
    </body>

</html>
