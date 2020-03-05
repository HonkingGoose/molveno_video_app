<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            var globalCsrfToken = "{{ csrf_token() }}";
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="{{ asset('css/guest_master.css') }}" rel="stylesheet">
        @stack('styles')
        <title>Molveno Lake Resort Video App - @yield('title')</title>
    </head>
    <body>


        @yield('content')

    </body>
</html>
