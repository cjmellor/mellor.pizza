<div>
    @if($paginator->hasPages())
        <nav class="px-4 flex items-center justify-between sm:px-0">
            @if($paginator->onFirstPage())
                <div class="-mt-px w-0 flex-1 flex">&nbsp;</div>
            @else
                <div class="-mt-px w-0 flex-1 flex">
                    <x-link
                        :livewire="true"
                        class="border-t-2 border-transparent cursor-pointer pt-4 pr-1 inline-flex items-center text-lg sm:text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        wire:click="previousPage">
                        <svg aria-hidden="true" class="mr-3 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                  d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                  fill-rule="evenodd"/>
                        </svg>
                        Previous
                    </x-link>
                </div>
            @endif

            @if($paginator->hasMorePages())
                <div class="-mt-px w-0 flex-1 flex justify-end">
                    <x-link :livewire="true"
                            class="border-t-2 border-transparent cursor-pointer pt-4 pl-1 inline-flex items-center text-lg sm:text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                            wire:click="nextPage">
                        Next
                        <svg aria-hidden="true" class="ml-3 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                  d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                  fill-rule="evenodd"/>
                        </svg>
                    </x-link>
                </div>
            @else
                <div class="-mt-px w-0 flex-1 flex justify-end">&nbsp;</div>
            @endif
        </nav>
    @endif
</div>
