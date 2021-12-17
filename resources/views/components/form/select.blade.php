@props([
'for',
'name' => $for
])

<select
    {{ $attributes->class([
        'mt-2.5 block w-full',
        'form-pizza' => ! $errors->has($for),
        'form-pizza-error' => $errors->has($for),
    ]) }}
    autocomplete="{{ $for }}" id="{{ $for }}" name="{{ $name }}">
    {{ $slot }}
</select>

@error($for)
<p class="text-red-500 dark:text-red-400 text-sm mt-2.5">{{ $message }}</p>
@enderror
