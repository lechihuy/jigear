<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/swipe.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
     
</head>
<body>
    @include('layouts.header')
    @yield('content')

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="{{ mix('js/swipe.js') }}"></script>
    <script src="{{ mix('js/app.js') }}">,</script>
</body>
</html>