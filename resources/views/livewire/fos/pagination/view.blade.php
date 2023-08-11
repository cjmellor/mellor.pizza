<div>
    @if ($paginator->hasPages())
        <nav class="px-4 flex items-center justify-between sm:px-0">
            @if ($paginator->onFirstPage())
                <div class="-mt-px w-0 flex-1 flex">&nbsp;</div>
            @else
                <div class="-mt-px w-0 flex-1 flex">
                    {{-- Go to first page --}}
                    <x-link
                        class="border-t-2 border-transparent cursor-pointer pt-4 pr-1 inline-flex items-center text-lg sm:text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        :livewire="true"
                        wire:click="gotoPage(1)"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </x-link>

                    <x-link
                        class="border-t-2 border-transparent cursor-pointer pt-4 pr-1 inline-flex items-center text-lg sm:text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        :livewire="true"
                        wire:click="previousPage"
                    >
                        <svg
                            class="mr-3 h-5 w-5 text-gray-500"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                clip-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                fill-rule="evenodd"
                            />
                        </svg>
                        Previous
                    </x-link>
                </div>
            @endif

            @if ($paginator->hasMorePages())
                <div class="-mt-px w-0 flex-1 flex justify-end">
                    <x-link
                        class="border-t-2 border-transparent cursor-pointer pt-4 pl-1 inline-flex items-center text-lg sm:text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        :livewire="true"
                        wire:click="nextPage"
                    >
                        Next
                        <svg
                            class="ml-3 h-5 w-5 text-gray-500"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                clip-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                fill-rule="evenodd"
                            />
                        </svg>
                    </x-link>

                    {{-- Go to End link --}}
                    <x-link
                        class="border-t-2 border-transparent cursor-pointer pt-4 pl-1 inline-flex items-center text-lg sm:text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        :livewire="true"
                        wire:click="gotoPage({{ $paginator->lastPage() }})"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            ></path>
                            <path
                                fill-rule="evenodd"
                                d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </x-link>

                </div>
            @else
                <div class="-mt-px w-0 flex-1 flex justify-end">&nbsp;</div>
            @endif
        </nav>
    @endif
</div>
