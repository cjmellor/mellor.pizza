@props([
    'checked' => old($name, $checked),
    'name',
])

<input
    id="{{ $name }}"
    name="{{ $name }}"
    type="checkbox"
    {{ $attributes->class('dark:bg-dark dark:focus:ring-offset-dark focus:ring-pizza dark:focus:ring-pizza-dark h-4 w-4 text-pizza dark:text-pizza-dark border-gray-300 dark:border-dark-line-lighter rounded') }}
    @checked($checked)
/>
