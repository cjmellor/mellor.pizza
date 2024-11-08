<x-layout.main container subTitle="Chris Mellors' CV">
    <x-header></x-header>

    @section("meta-description")
        <meta
            name="description"
            content="Discover Chris Mellors' professional experience and skills"
        />
    @endsection

    <!-- Main container -->
    <main class="container relative my-20 space-y-8 px-3.5 md:px-24">
        {{-- Print button --}}
        <div
            class="hidden xl:absolute xl:right-0 xl:top-0 xl:block print:hidden"
        >
            <button
                onclick="window.print()"
                class="button-pizza dark:button-pizza-dark"
            >
                Print
            </button>
        </div>
        <!-- Header section -->
        <header class="mb-12 text-center">
            <h1 class="mb-2 hidden text-4xl font-bold print:block">
                Chris Mellor
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                A
                <strong class="font-semibold">Full-stack Developer</strong>
                from
                <strong class="font-semibold">Leeds, UK</strong>
            </p>

            <!-- Contact links -->
            <div
                class="mt-6 flex flex-wrap justify-center gap-4 text-lg md:text-base"
            >
                {{-- Email --}}
                <a
                    href="mailto:chris@mellor.pizza"
                    class="flex items-center gap-2 text-pizza hover:underline hover:opacity-80 dark:text-pizza-dark print:text-black"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                    <span class="print:hidden">Email</span>
                    <span class="hidden print:inline">chris@mellor.pizza</span>
                </a>

                {{-- GitHub --}}
                <a
                    href="https://github.com/cjmellor"
                    class="flex items-center gap-2 text-pizza hover:underline hover:opacity-80 dark:text-pizza-dark print:text-black"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"
                        />
                        <path d="M9 18c-4.51 2-5-2-7-2" />
                    </svg>
                    <span class="print:hidden">GitHub</span>
                    <span class="hidden print:inline">cjmellor</span>
                </a>

                {{-- X --}}
                <a
                    href="https://x.com/cmellor"
                    class="flex items-center gap-2 text-pizza hover:opacity-80 dark:text-pizza-dark print:text-black"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            d="M4 4l11.733 16h4.267l-11.733-16zM4 20l6.768-8.309m2.197-2.691l6.768-8.309"
                        />
                    </svg>
                    <span class="hidden print:inline">@cmellor</span>
                </a>
            </div>
        </header>

        <!-- Professional Summary -->
        <section>
            <h2
                class="mb-4 text-2xl font-bold text-pizza dark:text-pizza-dark print:text-black"
            >
                Professional Summary
            </h2>
            <p
                class="text-sm leading-relaxed text-gray-700 md:text-base dark:text-gray-300"
            >
                Full-stack developer with 5 years of commercial experience
                creating SaaS platforms and eCommerce solutions. My expertise
                lies in the Laravel ecosystem, though I readily adapt to other
                modern development stacks when needed. I focus on writing clean,
                maintainable code backed by solid testing practices. My approach
                combines practical solutions with modern development techniques
                to deliver robust, well-structured applications.
            </p>
        </section>

        <!-- Technical Skills -->
        <section>
            <h2
                class="mb-4 text-2xl font-bold text-pizza dark:text-pizza-dark print:text-black"
            >
                Technical Skills
            </h2>

            <div class="grid gap-6 md:grid-cols-3 print:grid-cols-1">
                <!-- Primary Stack -->
                <div
                    class="rounded-lg bg-pizza/5 p-6 shadow-pizza/50 ring-1 ring-pizza/20 dark:bg-dark dark:ring-dark-line print:bg-transparent print:p-0 print:px-4 print:ring-0"
                >
                    <h3
                        class="mb-3 font-bold text-pizza dark:text-pizza-dark print:text-black"
                    >
                        Primary Stack
                    </h3>
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Laravel</li>
                        <li>Livewire</li>
                        <li>Tailwind CSS</li>
                        <li>Alpine.js</li>
                    </ul>
                </div>

                <!-- Additional Technologies -->
                <div
                    class="rounded-lg bg-pizza/5 p-6 shadow-pizza/50 ring-1 ring-pizza/20 dark:bg-dark dark:ring-dark-line print:bg-transparent print:p-0 print:px-4 print:ring-0"
                >
                    <h3
                        class="mb-3 font-bold text-pizza dark:text-pizza-dark print:text-black"
                    >
                        Additional Technologies
                    </h3>
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Vue.js</li>
                        <li>PestPHP/PHPUnit</li>
                        <li>Git</li>
                        <li>GitHub</li>
                        <li>CI/CD</li>
                    </ul>
                </div>

                <!-- Development Environment -->
                <div
                    class="rounded-lg bg-pizza/5 p-6 shadow-pizza/50 ring-1 ring-pizza/20 dark:bg-dark dark:ring-dark-line print:bg-transparent print:p-0 print:px-4 print:ring-0"
                >
                    <h3
                        class="mb-3 font-bold text-pizza dark:text-pizza-dark print:text-black"
                    >
                        Development Environment
                    </h3>
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li>PHPStorm</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Professional Experience -->
        <section class="space-y-8 sm:space-y-0 print:space-y-6">
            <h2
                class="text-2xl font-bold text-pizza dark:text-pizza-dark print:text-black"
            >
                Professional Experience
            </h2>

            <!-- 59club Ltd -->
            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-2">
                <div class="mb-4 flex flex-wrap items-start justify-between">
                    <div class="space-y-1.5">
                        <h3
                            class="text-xl font-bold text-pizza dark:text-pizza-dark print:text-black"
                        >
                            Laravel Developer
                        </h3>
                        <p
                            class="font-semibold text-gray-600 dark:text-gray-400"
                        >
                            59club Ltd
                        </p>
                    </div>
                    <p class="dark:text-gray-400">01/2022 - Present</p>
                </div>
                <ul
                    class="list-inside list-disc space-y-2 text-sm text-gray-700 md:text-base dark:text-gray-300"
                >
                    <li>
                        Spearheaded system modernisation by resolving critical
                        bugs and implementing new features while successfully
                        upgrading the Laravel framework version
                    </li>
                    <li>
                        Core member of a three-person team rebuilding the
                        company's flagship software from the ground up using the
                        TALL stack (Tailwind, Alpine.js, Laravel, Livewire)
                    </li>
                    <li>
                        Actively contributed to code quality through regular
                        peer review processes and pull request assessments
                    </li>
                    <li>
                        Successfully delivered a complete mobile solution,
                        encompassing both a cross-platform application (built
                        with Vue.js and Ionic Framework) and its supporting
                        Laravel API using Sanctum authentication. Notable
                        achievement in independently learning multiple new
                        technologies and delivering both applications to
                        production within a 6-month timeline
                    </li>
                    <li>
                        Established and configured Laravel Vapor infrastructure,
                        including implementation of dynamic PR environments for
                        enhanced testing capabilities
                    </li>
                    <li>
                        Developed and maintained robust CI/CD pipelines in
                        Bitbucket to ensure smooth deployment processes
                    </li>
                </ul>
            </div>

            <!-- Jump24 Ltd -->
            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-2">
                <div class="mb-4 flex flex-wrap items-start justify-between">
                    <div class="space-y-1.5">
                        <h3
                            class="text-xl font-bold text-pizza dark:text-pizza-dark print:text-black"
                        >
                            PHP Developer
                        </h3>
                        <p
                            class="font-semibold text-gray-600 dark:text-gray-400"
                        >
                            Jump Twenty Four Ltd
                        </p>
                    </div>
                    <p class="dark:text-gray-400">06/2021 - 12/2021</p>
                </div>
                <ul
                    class="list-inside list-disc space-y-2 text-sm text-gray-700 md:text-base dark:text-gray-300"
                >
                    <li>
                        Led multiple client projects in an agency environment,
                        focusing on modernising legacy applications using
                        Laravel and modern PHP practices
                    </li>
                    <li>
                        Architected and implemented new features using
                        Inertia.js, demonstrating ability to adapt to
                        client-specific technology requirements
                    </li>
                    <li>
                        Championed test-driven development practices,
                        significantly improving code reliability and maintenance
                    </li>
                    <li>
                        Collaborated directly with clients through daily
                        stand-ups to gather requirements and demonstrate feature
                        implementations
                    </li>
                    <li>
                        Established coding standards and best practices that
                        were adopted across multiple projects
                    </li>
                </ul>
            </div>

            <!-- Interior Goods Direct -->
            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-2">
                <div class="mb-4 flex flex-wrap items-start justify-between">
                    <div class="space-y-1.5">
                        <h3
                            class="text-xl font-bold text-pizza dark:text-pizza-dark print:text-black"
                        >
                            Full-stack Developer
                        </h3>
                        <p
                            class="font-semibold text-gray-600 dark:text-gray-400"
                        >
                            Interior Goods Direct
                        </p>
                    </div>
                    <p class="dark:text-gray-400">01/2021 - 06/2021</p>
                </div>
                <ul
                    class="list-inside list-disc space-y-2 text-sm text-gray-700 md:text-base dark:text-gray-300"
                >
                    <li>
                        Played a key role in developing and enhancing a
                        Laravel-based eCommerce platform for a major UK blinds
                        and curtains retailer
                    </li>
                    <li>
                        Built complex product customisation features using
                        Vue.js components integrated with Laravel backend
                    </li>
                    <li>
                        Implemented responsive admin interfaces using Bootstrap,
                        improving internal team efficiency
                    </li>
                    <li>
                        Collaborated in an agile environment to deliver new
                        features while maintaining existing functionality
                    </li>
                    <li>
                        Optimised database queries and API endpoints to improve
                        application performance
                    </li>
                </ul>
            </div>

            <!-- VOODOO -->
            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-2">
                <div class="mb-4 flex flex-wrap items-start justify-between">
                    <div class="space-y-1.5">
                        <h3
                            class="text-xl font-bold text-pizza dark:text-pizza-dark print:text-black"
                        >
                            Full-stack Developer
                        </h3>
                        <p
                            class="font-semibold text-gray-600 dark:text-gray-400"
                        >
                            VOODOO
                        </p>
                    </div>
                    <p class="dark:text-gray-400">11/2019 - 11/2020</p>
                </div>
                <ul
                    class="list-inside list-disc space-y-2 text-sm text-gray-700 md:text-base dark:text-gray-300"
                >
                    <li>
                        Spearheaded complete rebuild of company website using
                        Laravel, Vue.js, and Tailwind CSS, delivering a modern,
                        responsive platform
                    </li>
                    <li>
                        Designed and implemented scalable architecture using
                        Docker containerisation and Kubernetes orchestration
                    </li>
                    <li>
                        Established automated deployment workflows through
                        custom CI/CD pipeline configurations
                    </li>
                    <li>
                        Improved development workflow by implementing
                        containerised environments using Rancher
                    </li>
                    <li>
                        Collaborated with UK development team to establish new
                        technical standards and practices
                    </li>
                </ul>
            </div>

            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-2">
                <div class="mb-4 flex flex-wrap items-start justify-between">
                    <div class="space-y-1.5">
                        <h3
                            class="text-xl font-bold text-pizza dark:text-pizza-dark print:text-black"
                        >
                            Technical Engineer
                        </h3>
                        <p
                            class="font-semibold text-gray-600 dark:text-gray-400"
                        >
                            VOODOO
                        </p>
                    </div>
                    <p class="dark:text-gray-400">02/2017 - 11/2019</p>
                </div>
                <ul
                    class="list-inside list-disc space-y-2 text-sm text-gray-700 md:text-base dark:text-gray-300"
                >
                    <li>
                        Led the development of a new RESTful API, implementing
                        PSR standards and comprehensive documentation
                    </li>
                    <li>
                        Revolutionised deployment processes by introducing
                        Git-based workflows, replacing legacy FTP deployments
                    </li>
                    <li>
                        Mentored development team on modern version control
                        practices and deployment strategies
                    </li>
                    <li>
                        Architected and delivered a white-label solution based
                        on the core API platform
                    </li>
                    <li>
                        Implemented monitoring solutions using Docker to improve
                        service reliability
                    </li>
                    <li>
                        Enhanced support processes through effective ticketing
                        system management and customer query resolution
                    </li>
                </ul>
            </div>

            <!-- Additional experience entries would follow the same pattern -->
            <!-- For brevity, I'll truncate here as the structure repeats -->
        </section>

        <!-- Industry Engagement & Open Source -->
        <section>
            <h2
                class="mb-4 text-2xl font-bold text-pizza dark:text-pizza-dark print:text-black"
            >
                Industry Engagement & Open Source
            </h2>
            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-3">
                <p
                    class="text-sm leading-relaxed text-gray-700 md:text-base dark:text-gray-300"
                >
                    I create Laravel packages that solve problems I've
                    encountered in my own development work. When existing
                    packages don't meet my standards or specific needs, I build
                    my own solutions. One of my packages has gained over 500
                    stars on GitHub and continues to receive recognition on X. I
                    maintain an active presence in the Laravel ecosystem,
                    keeping ahead of framework developments and emerging tools,
                    which helps me bring fresh perspectives to my projects.
                </p>
            </div>
        </section>

        <!-- Interests -->
        <section>
            <h2
                class="mb-4 text-2xl font-bold text-pizza dark:text-pizza-dark print:text-black"
            >
                Interests
            </h2>
            <div class="rounded-lg bg-white md:p-6 dark:bg-dark print:md:p-3">
                <p
                    class="text-sm leading-relaxed text-gray-700 md:text-base dark:text-gray-300"
                >
                    Beyond development, I'm passionate about solo travel and
                    experiencing different cultures. A long-time wrestling fan,
                    I balance this with regularly attending live music events
                    and festivals. I maintain a keen interest in AI
                    technologies, exploring their potential in modern
                    development practices.
                </p>
            </div>
        </section>
    </main>
</x-layout.main>
