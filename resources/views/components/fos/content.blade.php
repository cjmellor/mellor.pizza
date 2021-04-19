<header>
    👋 Hi, {{ auth()->user()->name }}
</header>

{{--Error reporting--}}
<x-form.error></x-form.error>

<main>
    {{ $slot }}
</main>
