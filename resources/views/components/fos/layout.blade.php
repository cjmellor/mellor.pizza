<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mellor.🍕 - Fortress of Solitude :: {{ $title ?? 'Home' }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('stylesheets')
</head>
<body class="dark:bg-dark">
    {{ $slot }}
    <livewire:scripts />
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
