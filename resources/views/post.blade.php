<x-layout.main :container="false" :subTitle="$post->title" class="!pt-0 bg-white dark:bg-dark">
    @section('meta-description')
        <meta name="description" content="{{ $post->excerpt }}">
    @endsection

    @section('openGraph')
        <x-open-graph :post="$post" />
    @endsection

    @if(request()->routeIs('fos.preview'))
        <div class="flex justify-center fixed w-full mx-auto mt-2 z-[10]">
            <div class="w-1/2 sm:w-1/6 bg-blue-500 text-gray-50 rounded-full px-3 py-1 text-center">
                Preview Mode &bullet; <a class="hover:underline" href="{{ route('fos.posts.edit', $post) }}">Edit</a>
            </div>
        </div>
    @endif

    {{--Post Meta--}}
    <div class="h-screen overscroll-contain">
        <header class="h-screen">
            <div class="relative">
                <div class="h-screen bg-auto sm:bg-cover bg-no-repeat bg-center blur-sm"
                     style="background-image: url({{ Storage::disk(config('filesystems.default'))->url($post->post_image) }})">
                </div>
                <div class="absolute inset-0 h-screen bg-gradient-to-tr from-pizza to-pizza-dark opacity-60">&nbsp;</div>
                <div class="absolute inset-0">
                    <div class="container mx-auto h-screen flex flex-col justify-center text-left space-y-8 sm:space-y-12 ml-4 sm:ml-20">
                        <div class="flex space-x-2">
                            <a class="mr-2 sm:mr-4" href="{{ route('homepage') }}">
                                <svg class="not-sr-only h-6 w-6 text-slate-100 hover:dark:text-slate-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Home</span>
                            </a>
                            @foreach($post->tags as $tag)
                                <x-pill>{{ $tag->name }}</x-pill>
                            @endforeach
                        </div>
                        <div>
                            <h1 class="text-gray-50 text-[7vw] sm:text-[4vw] md:text-[5vw] lg:text-[4vw] xl:text-[3vw] font-merriweather tracking-wide leading-snug text-shadow">{{ $post->title }}</h1>
                        </div>
                        <div class="text-gray-50 text-sm sm:text-lg tracking-wide">
                            Posted by <img alt="{{ $post->author->name }}" class="w-8 h-8 mx-1 rounded-full inline-flex"
                                           src="{{ $post->author->avatar_path }}">
                            <strong>{{ $post->author->name }}</strong>
                            on {{ $post->published_at->format('F jS, Y') }} <span class="text-sm hidden sm:inline-flex">&bullet; {{ Str::readingTime($post->post_content) }} read time</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{--Post Content--}}
        <article class="h-screen">
            <div class="prose dark:prose-invert max-w-prose prose-sm sm:prose-base lg:prose-lg xl:prose-xl 2xl:prose-2xl mx-4 sm:mx-auto mt-6 sm:mt-12 sm:mb-24 prose-pre:px-0 sm:prose-pre:px-0 lg:prose-pre:px-0 xl:prose-pre:px-0 2xl:prose-pre:px-0 prose-a:text-pop prose-a:no-underline hover:prose-a:underline dark:hover:prose-a:decoration-pizza-dark prose-code:text-pizza prose-code:bg-pizza/30 dark:prose-code:text-pink-600 dark:prose-code:bg-pink-900/30 prose-code:px-1.5 prose-code:font-roboto-mono prose-code:before:content-none prose-code:after:content-none">
                {!! $post->content !!}
            </div>
        </article>
    </div>
</x-layout.main>
