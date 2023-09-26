<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @yield('meta-description')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mellor.🍕 - {{ $subTitle ?? 'Home' }}</title>
    @yield('openGraph')
    @production
        <script async src="https://stats.mellor.pizza/script.js" data-website-id="1b7cefd4-6779-49e3-9be3-f2ea9ed470e1"></script>
    @endproduction
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles/>
    @stack('stylesheets')
</head>
<body>
<x-toast/>
<div {{ $attributes->class(['pt-8 pb-4 mx-auto dark:text-dark-gray dark:text-opacity-70', 'container' => $container ?? '']) }}>
    {{ $slot }}
    <livewire:contact-popup/>
</div>
<livewire:scripts/>
@stack('scripts')
</body>
</html>
