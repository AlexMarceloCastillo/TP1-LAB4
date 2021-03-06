<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!--Jquery-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/918d19c8b4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- css propios -->
    @stack('styles')
    <title>@yield('title')</title>
</head>
<body>

    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js">
    </script><script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="/js/abm.js"></script>
</body>
</html>
