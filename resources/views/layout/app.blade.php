<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @yield('css')
</head>

<body>
    @include('layout.header')
    <section class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('js')
</body>

</html>
