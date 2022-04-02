<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/jigear-logo.png') }}" type="image/x-icon" />

    @routes

    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
    @include('layouts.header')

    <div class="pt-10">
        @yield('content')
    </div>

    @include('layouts.footer')

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