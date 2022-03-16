<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/swipe.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    @include('layouts.header')
    @yield('content')

    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="{{ mix('js/swipe.js') }}"></script>
    <script src="{{ mix('js/app.js') }}">,</script>
</body>
</html>