<main>
    <div class="flex flex-col lg:flex-row lg:mx-12 xl:mx-32 2xl:mx-48 mt-16 space-y-12 lg:space-y-0">
        <div class="lg:w-1/3 lg:ml-16 flex justify-center lg:justify-start items-center">
            <x-floating-head/>
        </div>
        <div class="lg:w-2/3 lg:ml-24">
            <div class="flex flex-col h-full justify-center space-y-8 tracking-wider mx-8 lg:mx-0 text-center lg:text-left">
                <h2 class="text-2xl lg:text-3xl font-merriweather">Hi 👋 I'm <span class="font-extrabold">Chris</span>. I'm a Full Stack Developer.</h2>
                <div class="space-y-8 ml-6">
                    <p class="text-xl font-roboto-mono">I build <span class="text-2xl font-merriweather text-pop">Laravel</span> apps</p>
                    <p class="text-xl font-roboto-mono">Using <span class="text-2xl font-merriweather text-pop">Tailwind CSS</span></p>
                    <p class="text-xl font-roboto-mono">
                        <span class="text-2xl font-merriweather text-pop">Alpine.js</span> is best <sup title="In my opinion">*</sup>
                    </p>
                    <p class="text-xl font-roboto-mono">I ❤️ <span class="text-2xl font-merriweather text-pop">TALL Stack</span></p>
                    <p class="text-xl font-roboto-mono"><span class="text-2xl font-merriweather text-pop">Linux</span> certified</p>
                    <p class="text-xl font-roboto-mono inline-block">Check out my
                        <x-link to="{{ asset('storage/cv.pdf') }}" underline="false">
                            <span class="text-2xl font-merriweather ml-3 text-pop">CV</span>
                        </x-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-10 sm:space-y-16">
        <div class="text-center font-merriweather mt-4 text-neutral-600 dark:text-gray-400">
            <p class="inline-flex text-2xl sm:text-4xl">Check out my latest blog posts
                <a aria-label="check out latest blog posts" href="#blog-posts">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden sm:block h-10 w-8 ml-6 text-pizza dark:text-pizza-dark animate-bounce" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
            </p>
        </div>
        <hr class="border-gray-300 dark:border-gray-700 w-1/2 mx-auto">
        <div id="blog-posts">
            <x-posts-list format="short" limit="3"></x-posts-list>
            <div class="flex justify-center pb-8 lg:pb-16">
                <x-link to="#" class="font-merriweather text-xl" href="{{ route('blog') }}">See more posts</x-link>
            </div>
        </div>
    </div>
</main>
