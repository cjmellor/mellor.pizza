<main>
    <div class="mt-20 flex flex-col space-y-12 lg:mx-12 lg:flex-row lg:space-y-0 xl:mx-32 2xl:mx-48">
        <div class="flex flex-col items-center justify-center gap-y-8 md:gap-y-12 lg:ml-16 lg:w-1/3 lg:justify-start">
            <x-floating-head />
            {{-- X (Twitter) --}}
            <div class="flex space-x-6">
                <a
                    href="https://x.com/cmellor"
                    aria-label="X"
                    target="_blank"
                >
                    <svg
                        class="size-7 text-gray-900 hover:text-pizza dark:text-white dark:hover:text-pizza-dark"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="currentColor"
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                        />
                    </svg>
                </a>
                {{-- GitHub --}}
                <a
                    href="https://github.com/cjmellor"
                    aria-label="GitHub"
                    target="_blank"
                >
                    <svg
                        class="size-7 text-gray-900 hover:text-pizza dark:text-white dark:hover:text-pizza-dark"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M12 0C5.373 0 0 5.373 0 12c0 5.303 3.438 9.8 8.205 11.387.6.111.82-.261.82-.577 0-.285-.01-1.04-.015-2.04-3.338.726-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.757-1.333-1.757-1.09-.745.083-.729.083-.729 1.205.084 1.84 1.237 1.84 1.237 1.07 1.835 2.807 1.305 3.492.998.108-.775.418-1.305.76-1.605-2.665-.305-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.235-3.22-.123-.303-.535-1.527.117-3.176 0 0 1.008-.322 3.3 1.23a11.53 11.53 0 0 1 3-.405 11.53 11.53 0 0 1 3 .405c2.29-1.552 3.297-1.23 3.297-1.23.653 1.649.241 2.873.118 3.176.77.84 1.235 1.91 1.235 3.22 0 4.61-2.803 5.62-5.475 5.92.43.37.81 1.102.81 2.222 0 1.606-.015 2.898-.015 3.293 0 .319.218.694.825.576C20.565 21.795 24 17.298 24 12c0-6.627-5.373-12-12-12z"
                        />
                    </svg>
                </a>
            </div>
        </div>
        <div class="lg:ml-24 lg:w-2/3">
            <div
                class="mx-8 flex h-full flex-col justify-center space-y-8 font-merriweather tracking-wider lg:mx-0 lg:text-left">
                <h2 class="text-2xl lg:text-3xl">👋 Hi I'm <span class="font-extrabold">Chris</span></h2>
                <div class="ml-6 space-y-8">
                    <p class="md:text-xl">🏗️ I build rock-solid web applications</p>
                    <p class="md:text-xl">
                        🚀 I specialize in PHP backends that scale, with expertise in
                        <span class="font-semibold">Laravel</span> and the
                        <span class="font-semibold">TALL</span>stack.
                        I turn complex problems into elegant, tested solutions.
                    </p>
                    <p class="md:text-xl">✨ Clean code and thorough testing are core to my workflow</p>
                    <p class="md:text-xl">🟢 Open to Remote Roles<br>(Permanent • Contract • Freelance)</p>
                    <p class="inline-block md:text-xl">📄 Check out my
                        <x-link
                            to="{{ route('cv') }}"
                            underline="false"
                        >
                            <span class="text-pop ml-3 font-merriweather text-2xl">CV</span>
                        </x-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-10 sm:space-y-16">
        <div class="mt-4 text-center font-merriweather text-neutral-600 dark:text-gray-400">
            <p class="inline-flex text-2xl sm:text-4xl">Check out my latest articles
                <a
                    href="#blog-posts"
                    aria-label="check out latest articles"
                >
                    <svg
                        class="ml-6 hidden h-10 w-8 animate-bounce text-pizza sm:block dark:text-pizza-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>
                </a>
            </p>
        </div>
        <hr class="mx-auto w-1/2 border-gray-300 dark:border-gray-700">
        <div id="blog-posts">
            <x-posts-list
                format="short"
                limit="3"
            ></x-posts-list>
            <div class="flex justify-center pb-8 lg:pb-16">
                <x-link
                    class="font-merriweather text-xl"
                    href="{{ route('blog') }}"
                    to="#"
                >See more posts
                </x-link>
            </div>
        </div>
    </div>
</main>
