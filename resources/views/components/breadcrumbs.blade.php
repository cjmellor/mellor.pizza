<nav
    aria-label="Breadcrumb"
    {{ $attributes->class(['flex']) }}
>
    <ol
        class="flex items-center space-x-4"
        role="list"
    >
        <li>
            <div>
                <a
                    class="text-gray-400 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-300"
                    href="/"
                >
                    <svg
                        class="shrink-0 h-5 w-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                        />
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>

        @foreach ($lists as $list => $url)
            <li>
                <div class="flex items-center">
                    <svg
                        class="shrink-0 h-5 w-5 text-gray-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <x-link
                        class="ml-4 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        :to="$url"
                    >{{ $list }}</x-link>
                </div>
            </li>
        @endforeach
    </ol>
</nav>
