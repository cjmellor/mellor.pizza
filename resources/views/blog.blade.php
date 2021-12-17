<x-layout.main container subTitle="Blog Posts">
    <x-header></x-header>

    @section('meta-description')
        <meta name="description" content="All blog posts written on Chris Mellors' blog">
    @endsection

    <div class="space-y-12 sm:mt-12 mb-16 divide-y dark:divide-gray-700">
        @forelse($posts as $post)
            <div class="w-11/12 sm:w-full mx-auto sm:mx-0">
                <div class="flex flex-col space-y-10 pt-16 sm:pt-12 dark:text-dark-gray tracking-wider">
                    <div class="flex flex-col-reverse sm:flex-row justify-between">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4 mt-8 sm:mt-0">
                                <div>
                                    @foreach($post->tags as $tag)
                                        <x-pill>{{ $tag->name }}</x-pill>
                                    @endforeach
                                </div>
                                <div class="text-sm font-roboto-mono">{{ $post->published_at->format('jS F, Y') }}</div>
                            </div>
                            <div class="text-2xl sm:text-3xl font-merriweather text-gray-300">
                                <x-link class="!text-gray-700 dark:!text-gray-300" to="{{ route('post.show', $post->slug) }}">{{ $post->title }}</x-link>
                            </div>
                            <div class="dark:text-dark-gray/70 text-lg">{{ $post->excerpt }}</div>
                        </div>
                        @if($post->post_image)
                            <div class="max-h-4">
                                <img alt="{{ $post->title }}" class="w-full sm:w-64 sm:h-32 object-cover rounded-md shadow-xl"
                                     src="{{ Storage::disk(config('filesystems.default'))->url($post->post_image) }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="flex justify-center pb-8 lg:pb-16">
                <p class="font-merriweather text-gray-500 text-5xl">Nothing yet... 😬</p>
            </div>
        @endforelse
    </div>
    <div class="mb-12">
        {{ $posts->links() }}
    </div>
</x-layout.main>
