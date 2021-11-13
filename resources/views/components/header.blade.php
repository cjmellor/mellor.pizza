<header>
    <div class="flex flex-col md:flex-row justify-evenly h-16 items-center space-y-8 md:space-y-0">
        <div class="w-full lg:w-5/12 xl:w-1/3">
            <h2 class="font-anton text-6xl md:text-5xl tracking-wider text-center md:text-left uppercase text-pizza dark:text-pizza-dark drop-shadow-lg">
                Chris.Mellor
            </h2>
        </div>
        <div class="flex justify-evenly md:justify-between w-full lg:w-5/12 xl:w-1/3 font-roboto-mono text-xl">
            <div class="uppercase tracking-wider">
                <x-link to="#">About.Me</x-link>
            </div>
            <div class="uppercase tracking-wider">
                <x-link to="#">Blog</x-link>
            </div>
            <div class="uppercase tracking-wider">
                <x-link x-data="" x-on:click.prevent="$dispatch('show-contact')">Contact.Me</x-link>
            </div>
        </div>
    </div>
</header>

