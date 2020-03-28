<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- css propios -->
    @stack('styles')

    <!--scripts generales-->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('js/rd-smoothscroll.min.js')}}"></script>
    <script src="{{asset('js/device.min.js')}}"></script>

    <!--otros scripts-->
    @yield('scripts')

    <!--titulo-->
    <title>@yield('title')</title>
</head>

<body>

    @yield('content')


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>
