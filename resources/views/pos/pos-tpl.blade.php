<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('pos.partials._stylesheet')
</head>
<body class="antialiased">

    @include('pos.includes.topbar')

    @include('pos.includes.offcanvas')

    @include('pos.partials._messages')

    @yield('content')

    @include('pos.partials._footer')

    @include('pos.partials._javascript')

</body>
</html>
