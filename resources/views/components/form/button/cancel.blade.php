@props(['to'])

<button
    {{ $attributes->class('bg-white dark:bg-dark py-3 px-4 border border-gray-300 dark:border-dark-line-lighter rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-pizza dark:focus:ring-pizza-dark') }}
    type="button">
    {{ $slot }}
</button>
