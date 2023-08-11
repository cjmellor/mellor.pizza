@props(['to'])

<button
    type="submit"
    {{ $attributes->class('button-pizza') }}
>
    {{ $slot }}
</button>
