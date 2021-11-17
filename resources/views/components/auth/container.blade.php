<div class="flex flex-col justify-center sm:px-6 lg:px-8">
    <div class="mx-auto w-11/12 sm:w-full">
        {{ $breadcrumbs ?? '' }}

        <div {{ $attributes->merge(['class' => 'bg-gray-50 dark:bg-gray-700/20 border border-gray-200 dark:border-dark-line py-8 px-4 shadow-lg sm:rounded-lg sm:px-10']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
