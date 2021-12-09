<x-layout.main :container="false" :subTitle="$post->title" class="!pt-0 bg-white dark:bg-dark">
    @section('meta-description')
        <meta name="description" content="{{ $post->excerpt }}">
	@endsection

    @section('openGraph')
        <x-open-graph :post="$post"/>
    @endsection

    @if(request()->routeIs('fos.preview'))
        <div class="flex justify-center fixed w-full mx-auto mt-2 z-10">
            <div class="w-1/2 sm:w-1/6 bg-blue-500 text-gray-50 rounded-full px-3 py-1 text-center">
                Preview Mode &bullet; <a class="hover:underline" href="{{ route('fos.posts.edit', $post) }}">Edit</a>
            </div>
        </div>
    @endif

    {{--Post Meta--}}
    <div class="h-screen overflow-y-scroll snap-y snap-mandatory">
        <header class="h-screen snap-start">
            <div class="relative">
                <div class="h-screen bg-auto sm:bg-cover bg-no-repeat bg-center blur-sm"
                     style="background-image: url({{ Storage::disk('s3')->url($post->post_image) }})">
                </div>
                <div class="absolute inset-0 h-screen bg-gradient-to-tr from-pizza to-pizza-dark opacity-60">&nbsp;</div>
                <div class="absolute inset-0">
                    <div class="container mx-auto h-screen flex flex-col justify-center text-left space-y-8 sm:space-y-12 ml-4 sm:ml-20">
                        <div class="flex space-x-2">
                            <a class="mr-2 sm:mr-4" href="{{ route('homepage') }}">
                                <svg class="h-6 w-6 text-slate-100 hover:dark:text-slate-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                </svg>
                            </a>
                            @foreach($post->tags as $tag)
                                <x-pill>{{ $tag->name }}</x-pill>
                            @endforeach
                        </div>
                        <div>
                            <h1 class="text-gray-50 text-[7vw] sm:text-[4vw] md:text-[5vw] lg:text-[4vw] font-merriweather tracking-wide leading-snug text-shadow">{{ $post->title }}</h1>
                        </div>
                        <div class="text-gray-50 text-sm sm:text-lg tracking-wide">
                            Posted by <img alt="{{ $post->author->name }}" class="w-8 h-8 mx-1 rounded-full inline-flex"
                                           src="{{ $post->author->avatar_path }}">
                            <strong>{{ $post->author->name }}</strong>
                            on {{ $post->published_at->format('F jS, Y') }} <span class="text-sm hidden sm:inline-flex">&bullet; {{ Str::readingTime() }} read time</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{--Post Content--}}
        <article class="h-screen snap-center overflow-y-scroll">
            <div class="prose dark:prose-invert prose-sm sm:prose-base lg:prose-lg xl:prose-xl 2xl:prose-2xl mt-6 sm:mt-12 mt-12 w-11/12 sm:mb-24 mx-auto">
                {!! $post->content !!}
            </div>
        </article>
    </div>
</x-layout.main>
