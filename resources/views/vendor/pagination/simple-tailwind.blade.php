@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-dark border border-gray-300 dark:border-dark-line-lighter cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-dark-gray/70 bg-white dark:bg-dark border border-gray-300 dark:border-dark-line-lighter leading-5 rounded-md hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:ring-1 ring-pizza dark:ring-pizza-dark focus:border-pizza dark:focus:border-pizza-dark transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-dark-gray/70 bg-white dark:bg-dark border border-gray-300 dark:border-dark-line-lighter leading-5 rounded-md hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:ring-1 ring-pizza dark:ring-pizza-dark focus:border-pizza dark:focus:border-pizza-dark transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-dark border border-gray-300 dark:border-dark-line-lighter cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
