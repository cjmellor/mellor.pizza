@props(['to'])

<x-form action="{{ $to }}" method="delete">
    <input type="submit" value="{{ $slot }}">
</x-form>
