<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }} Administration</title>

    <link rel="stylesheet" href="{{ mix('css/admin/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}">
    
    @routes
</head>
<body>
    @yield('content')

    <script src="{{ mix('js/admin/app.js') }}"></script>
    @stack('scripts')
    <script>Alpine.start()</script>
</body>
</html>