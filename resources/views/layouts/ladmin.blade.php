<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/scss/ladmin.scss')
    @vite('resources/ts/ladmin.ts')
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div>
        {{ $header }}
        {{ $content }}
        {{ $footer }}
    </div>
</body>

</html>
