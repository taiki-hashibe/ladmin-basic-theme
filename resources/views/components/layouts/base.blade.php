<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/vendor/ladmin-basic-theme/ladmin.css">
    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-slate-100">
    <div class="min-h-screen">
        {{ $header }}
        {{ $content }}
        {{ $footer }}
    </div>
    <script src="/vendor/ladmin-basic-theme/ladmin.js"></script>
</body>

</html>
