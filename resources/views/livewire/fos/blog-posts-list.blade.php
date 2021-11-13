<div class="space-y-6">
    <div class="flow-root">
        <ul class="-my-5 divide-y dark:divide-cool-gray-700" role="list">
            @foreach($posts as $post)
                <li class="py-5">
                    <div class="flex justify-between space-x-4">
                        <div class="relative">
                            <h3 class="text-xl mb-4 font-merriweather font-semibold text-gray-800 dark:text-cool-gray-400">
                                <x-link class="focus:outline-none" title="{{ $post->title }}" :to="route('fos.preview', $post->id)">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </x-link>
                            </h3>
                            <div class="text-md text-gray-900 dark:text-gray-400">
                                {!! $post->excerpt !!}
                            </div>
                        </div>

                        <div x-data="{ showSubMenu: false }" x-cloak>
                            <div class="relative inline-block text-left">
                                {{--Three dots--}}
                                <div>
                                    <button aria-expanded="true"
                                            aria-haspopup="true"
                                            class="bg-gray-100 dark:bg-transparent rounded-full flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-pizza dark:focus:ring-pizza-dark"
                                            id="menu-button" type="button"
                                            x-on:click="showSubMenu = ! showSubMenu"
                                            x-on:click.outside="showSubMenu = false"
                                    >
                                        <span class="sr-only">Open sub-menu</span>
                                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </div>

                                {{--Menu--}}
                                <div
                                    aria-labelledby="menu-button"
                                    aria-orientation="vertical"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-gray-50 dark:bg-dark dark:border dark:border-dark-line focus:outline-none"
                                    role="menu" tabindex="-1"
                                    x-show="showSubMenu"
                                    @showHide
                                >
                                    <div class="py-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300" href="{{ route('fos.posts.edit', $post) }}" id="menu-item-0" role="menuitem" tabindex="-1">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{ $posts->links() }}

    <div class="mt-12">
        <a class="flex justify-center button-pizza" wire:click="viewMoreOrLessPosts">
            {{ $viewingAll ? 'View less' : 'View more' }}
        </a>
    </div>
</div>
