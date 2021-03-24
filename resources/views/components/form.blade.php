@props(['action', 'csrf', 'method'])
<form action="{{ $action }}" {{ $attributes->merge(['method' => 'post']) }} method="{{ $method }}">
    @if($csrf)
        @csrf
    @endif

    @method($method)

    {{ $slot }}
</form>
