<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/ladmin-basic-theme/css/ladmin.css') }}">
    <script src="{{ asset('vendor/ladmin-basic-theme/js/ladmin.js') }}"></script>
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div>testtest
        {{ $header }}
        {{ $content }}
        {{ $footer }}
    </div>
</body>

</html>
