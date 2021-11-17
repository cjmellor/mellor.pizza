@props(['to'])

<button {{ $attributes->class('button-pizza') }}
    type="submit">
    {{ $slot }}
</button>
