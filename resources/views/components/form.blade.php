@props(['action', 'csrf', 'method'])
<form action="{{ $action }}" {{ $attributes->merge(['method' => 'post']) }} method="{{ $method }}">
    @if($csrf)
        @csrf
    @endif

    @switch($method)
        @case('delete')
            @method('DELETE')
            @break
        @case('patch')
            @method('PATCH')
            @break
        @case('put')
            @method('PUT')
            @break
    @endswitch

    {{ $slot }}
</form>
