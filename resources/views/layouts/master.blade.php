<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title> @yield('page-name') / 3D Printing Nerds</title>
    </head>

    <body>
        <main>
            @include('inc.menu')
            @yield('page-content')
            @include('inc.footer')
        </main>

        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>

</html>