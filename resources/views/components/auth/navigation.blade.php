<nav x-data="{ showDropdown: false }">
    <div class="max-w-7xl mx-auto px-4 mb-4 sm:mb-8 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{--Links on left--}}
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a class="inline-flex items-center" href="/">
                        <svg class="h-6 w-6 text-gray-500 hover:text-gray-700 dark:text-slate-400 hover:dark:text-slate-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                    </a>
                    <x-link :active="request()->routeIs('fos.index')"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                            to="{{ route('fos.fos.index') }}">
                        Dashboard
                    </x-link>
                    <x-link :active="request()->routeIs('fos.posts.create')"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                            to="{{ route('fos.posts.create') }}">
                        Add New Post
                    </x-link>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:justify-between sm:w-48">
                <div class="font-medium tracking-wide text-sm text-gray-900 dark:text-gray-200">{{ auth()->user()->name }}</div>
                <button
                    class="rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pizza dark:focus:ring-pizza-dark"
                    type="button">
                    <span class="sr-only">View notifications</span>
                    <svg aria-hidden="true" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"></path>
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="relative">
                    <div>
                        <button aria-expanded="false" aria-haspopup="true"
                                class="rounded-full flex text-sm focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-offset-pizza dark:focus:ring-offset-pizza-dark focus:ring-pizza dark:focus:focus:ring-pizza-dark"
                                id="user-menu-button" type="button"
                                x-on:click="showDropdown = ! showDropdown"
                                x-on:click.outside="showDropdown = false"
                        >
                            <span class="sr-only">Open user menu</span>
                            <img alt="{{ auth()->user()->name }}" class="h-8 w-8 rounded-full" src="{{ auth()->user()->avatar_path }}">
                        </button>
                    </div>
                    <div aria-labelledby="user-menu-button" aria-orientation="vertical"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-gray-50 dark:bg-dark dark:border dark:border-dark-line focus:outline-none"
                         role="menu" tabindex="-1" x-show="showDropdown" @showHide()>
                        @if(!isAdminSection())
                            <a class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300"
                               href="{{ route('fos.index') }}" id="user-menu-item-1" role="menuitem" tabindex="-1">
                                Admin
                            </a>
                        @endif
                        {{--Fake to look like menu, but is really a button--}}
                        <a class="block cursor-pointer px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300"
                           id="user-menu-item-2" role="menuitem" tabindex="-1">
                            <x-form.form action="{{ route('logout') }}" method="post">
                                <input class="w-full text-left bg-transparent cursor-pointer" type="submit" value="Log out">
                            </x-form.form>
                        </a>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button aria-controls="mobile-menu"
                        aria-expanded="false"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-pizza/10 dark:hover:bg-pizza-dark/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pizza dark:focus:ring-pizza-dark"
                        type="button"
                        x-on:click="showDropdown = ! showDropdown">
                    <span class="sr-only">Open main menu</span>
                    <svg aria-hidden="true" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         x-bind:class="{ 'hidden': showDropdown, 'block': ! showDropdown }" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    <svg aria-hidden="true" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         x-bind:class="{ 'hidden': ! showDropdown, 'block': showDropdown }" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden shadow-2xl" id="mobile-menu" x-collapse x-show="showDropdown">
        <div class="sm:pt-2 pb-3 space-y-1">
            @if(!isAdminSection())
                <a class="bg-pizza/10 dark:bg-pizza-dark/10 border-pizza dark:border-pizza-dark text-pizza dark:text-pizza-dark block pl-3 pr-4 py-2 border-l-4 text-base font-medium"
                   href="{{ route('fos.index') }}">Admin</a>
            @endif
            <a class="block cursor-pointer px-4 py-2 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300"
               href="{{ route('fos.fos.index') }}">
                Dashboard
            </a>
            <a class="block cursor-pointer px-4 py-2 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300"
               href="{{ route('fos.posts.create') }}">
                Add New Post
            </a>
        </div>
        <div class="pt-4 pb-3 border-t dark:border-gray-700">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img alt="{{ auth()->user()->name }}" class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar_path }}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</div>
                </div>
                <button
                    class="ml-auto flex-shrink-0 bg-white dark:bg-dark p-1 rounded-full text-gray-400 hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-pizza dark:focus:ring-pizza-dark"
                    type="button">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg aria-hidden="true" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1">
                @unless(isAdminSection())
                    <a href="{{ route('fos.index') }}"
                       class="block cursor-pointer px-4 py-2 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
                        Admin
                    </a>
                @endunless
                <x-form.form action="{{ route('logout') }}" method="post">
                    <input
                        class="block cursor-pointer px-4 py-2 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300"
                        type="submit" value="Log out">
                </x-form.form>
            </div>
        </div>
    </div>
</nav>
