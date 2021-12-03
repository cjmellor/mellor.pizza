@props([
    'for' => null,
    'text'
])

<label {{ $attributes->class(['block text-sm font-medium text-gray-700 dark:text-gray-300']) }} for="{{ $for }}">
    {{ $text ?? Str::ucfirst($for) }}

    {{ $slot }}
</label>
