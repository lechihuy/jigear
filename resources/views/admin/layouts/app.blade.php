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

    <link rel="stylesheet" type="text/css" href="{{ asset('trix/trix.css') }}">
    <script type="text/javascript" src="{{ asset('trix/trix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('trix/attachment.js') }}"></script>
    <script src="{{ mix('js/admin/app.js') }}"></script>
</head>
<body class="bg-gray-100">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <main class="pt-16 lg:pl-72">
        <div class="container p-5 mx-auto lg:p-7">
            @yield('content')
        </div>
    </main>

    <x-toast />

    <x-confirm-modal />

    @stack('scripts')

    @if (Session::has('toast'))
        @php $toast = Session::get('toast') @endphp
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('toast').show('{{ $toast["type"] }}', '{{ $toast["message"] }}')
            })
        </script>
    @endif
    
    <script>Alpine.start();</script>
</body>
</html>