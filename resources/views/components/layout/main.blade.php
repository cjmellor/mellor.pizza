<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @yield('meta-description')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mellor.🍕 - {{ $subTitle ?? 'Home' }}</title>
    @yield('openGraph')
    <link as="style" href="{{ mix('css/app.css') }}" onload="this.onload=null;this.rel='stylesheet'" rel="preload">
    <noscript><link rel="stylesheet" href="{{ mix('css/app.css') }}"></noscript>
    <livewire:styles/>
    @stack('stylesheets')
</head>
<body>
<x-toast/>
<div {{ $attributes->class(['pt-8 pb-4 mx-auto dark:text-dark-gray dark:text-opacity-70', 'container' => $container ?? '']) }}>
    {{ $slot }}
</div>
<livewire:scripts/>
<script async defer src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
