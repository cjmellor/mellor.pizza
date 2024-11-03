<x-layout.main
    class="!pt-0 bg-white dark:bg-dark"
    :container="false"
    :subTitle="$post->title"
>
    @section('meta-description')
        <meta
            name="description"
            content="{{ $post->excerpt }}"
        >
    @endsection

    @section('openGraph')
        <x-open-graph :post="$post" />
    @endsection

    @if (request()->routeIs('fos.preview'))
        <div class="flex fixed justify-center mx-auto mt-2 w-full z-[10]">
            <div class="py-1 px-3 w-1/2 text-center text-gray-50 bg-blue-500 rounded-full sm:w-1/6">
                Preview Mode &bullet; <a
                    class="hover:underline"
                    href="{{ route('fos.posts.edit', $post) }}"
                >Edit</a>
            </div>
        </div>
    @endif

    {{-- Post Meta --}}
    <div class="overscroll-contain h-screen">
        <header class="h-screen">
            <div class="relative">
                <div
                    class="h-screen bg-center bg-no-repeat bg-auto sm:bg-cover blur-sm"
                    style="background-image: url({{ Storage::disk(config('filesystems.default'))->url($post->post_image) }})"
                >
                </div>
                <div class="absolute inset-0 h-screen bg-gradient-to-tr opacity-60 from-pizza to-pizza-dark">&nbsp;</div>
                <div class="absolute inset-0">
                    <div class="container flex flex-col justify-center mx-auto ml-4 space-y-8 h-screen text-left sm:ml-20 sm:space-y-12">
                        <div class="flex space-x-2">
                            <a
                                class="mr-2 sm:mr-4"
                                href="{{ route('homepage') }}"
                            >
                                <svg
                                    class="w-6 h-6 not-sr-only text-slate-100 hover:dark:text-slate-200"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                                    />
                                </svg>
                                <span class="sr-only">Home</span>
                            </a>
                            @foreach ($post->tags as $tag)
                                <x-pill>{{ $tag->name }}</x-pill>
                            @endforeach
                        </div>
                        <div>
                            <h1 class="tracking-wide leading-snug text-gray-50 text-[7vw] font-merriweather text-shadow sm:text-[4vw] md:text-[5vw] lg:text-[4vw] xl:text-[3vw]">{{ $post->title }}
                            </h1>
                        </div>
                        <div class="text-sm tracking-wide text-gray-50 sm:text-lg">
                            Posted by
                            <img
                                class="inline-flex mx-1 w-8 h-8 rounded-full"
                                src="{{ $post->author->avatar_path }}"
                                alt="{{ $post->author->name }}"
                            >
                            <strong>{{ $post->author->name }}</strong>
                            on {{ $post->published_at->format('F jS, Y') }} <span class="hidden text-sm sm:inline-flex">&bullet; {{ Str::readingTime($post->post_content) }} read time</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Post Content --}}
        <article class="h-screen">
            <div
                class="mx-4 mt-6 max-w-prose sm:mx-auto sm:mt-12 sm:mb-24 prose prose-sm prose-pre:px-0 prose-a:text-pop prose-a:no-underline prose-code:text-pizza prose-code:bg-pizza/30 prose-code:px-1.5 prose-code:font-roboto-mono prose-code:before:content-none prose-code:after:content-none sm:prose-base sm:prose-pre:px-0 lg:prose-lg lg:prose-pre:px-0 xl:prose-xl xl:prose-pre:px-0 2xl:prose-2xl 2xl:prose-pre:px-0 dark:prose-invert dark:hover:prose-a:decoration-pizza-dark dark:prose-code:text-pink-600 dark:prose-code:bg-pink-900/30 hover:prose-a:underline">
                {!! $post->content !!}
            </div>
        </article>
    </div>
</x-layout.main>
