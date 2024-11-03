<form
    action="{{ $action }}"
    {{ $attributes->merge(['method' => 'post']) }}
    method="{{ $method }}"
>
    @if ($csrf)
        @csrf
    @endif

    @unless($method == 'POST')
        @method($method)
    @endunless

    {{ $slot }}
</form>
