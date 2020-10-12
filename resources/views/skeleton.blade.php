<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title') - {{ config('app.name')  }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}" >
    @yield("style-sheets")
</head>
<body>
    @yield("body")

    @yield("scripts")
</body>
</html>
