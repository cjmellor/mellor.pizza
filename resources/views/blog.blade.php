<x-layout.main title="Blog Posts">
    <x-header></x-header>

    <div class="space-y-12 sm:mt-12 mb-16 divide-y dark:divide-cool-gray-700">
        @foreach($posts as $post)
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
                            <div>
                                <img alt="{{ $post->title }}" class="w-full sm:w-64 rounded-md shadow-xl"
                                     src="{{ asset('post_headers/'.$post->post_image) }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout.main>
