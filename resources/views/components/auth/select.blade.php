@props([
    'for',
    'name' => $for
])

<select
    {{ $attributes->class(['mt-2.5 block w-full form-pizza']) }}
    autocomplete="{{ $for }}" id="{{ $for }}" name="{{ $for }}">
    {{ $slot }}
</select>
