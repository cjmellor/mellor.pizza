@props(['to' => null])

<div class="inline-block underline-animate-container">
    <a {{ $attributes->merge(['class' => 'underline-animate-link']) }} href="{{ $to }}">{{ $slot }}</a>
</div>
