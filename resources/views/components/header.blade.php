<header>
    <div class="flex h-16 flex-col items-center justify-evenly space-y-8 md:flex-row md:space-y-0">
        <div class="w-full lg:w-5/12 xl:w-1/3">
            <a href="{{ route('homepage') }}">
                <h2
                    class="text-center font-anton text-6xl uppercase tracking-wider text-pizza drop-shadow-lg md:text-left md:text-5xl dark:text-pizza-dark">
                    Chris.Mellor
                </h2>
            </a>
        </div>
        <div
            class="flex w-full justify-evenly px-6 font-roboto-mono uppercase tracking-wider md:items-center md:px-0 md:text-xl lg:w-7/12 xl:w-2/3">
            <div>
                <x-link to="{{ route('blog') }}">Articles</x-link>
            </div>
            <div>
                <x-link to="{{ route('cv') }}">View CV</x-link>
            </div>
            <div>
                <x-link
                    x-data
                    x-on:click.prevent="$dispatch('show-contact')"
                >
                    Contact.Me
                </x-link>
            </div>
        </div>
    </div>
</header>
