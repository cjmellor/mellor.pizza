<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mellor.🍕 - {{ $title ?? 'Home' }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <livewire:styles/>
    @stack('stylesheets')
</head>
<body class="dark:bg-dark">
<x-toast/>
<div {{ $attributes->class(['container pt-8 pb-4 mx-auto dark:text-dark-gray dark:text-opacity-70']) }}>
    {{ $slot }}
</div>
<livewire:scripts/>
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
