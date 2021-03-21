@props(['to'])

<a {{ $attributes }} href="{{ $to }}">{{ $slot }}</a>
