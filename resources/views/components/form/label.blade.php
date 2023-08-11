@props([
    'for' => null,
    'text',
])

<label
    for="{{ $for }}"
    {{ $attributes->class(['block text-sm font-medium text-gray-700 dark:text-gray-300']) }}
>
    {{ $text ?? Str::ucfirst($for) }}

    {{ $slot }}
</label>
