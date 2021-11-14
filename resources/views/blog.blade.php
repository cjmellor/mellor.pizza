<x-layout.main title="Blog Posts">
    <x-header></x-header>

    <div class="space-y-16 mt-12 mb-16">
        <div class="space-y-10 divide-y dark:divide-cool-gray-700 w-11/12 sm:w-full mx-auto sm:mx-0">
            @foreach($posts as $post)
                <div class="flex flex-col space-y-6 pt-10 dark:text-dark-gray tracking-wider">
                    <div class="">{{ $post->published_at->format('jS F, Y')  }}</div>
                    <div class="text-2xl sm:text-3xl font-merriweather text-gray-300">
                        <x-link class="!text-gray-700 dark:!text-gray-300" to="{{ route('post.show', $post->slug) }}">{{ $post->title }}</x-link>
                    </div>
                    <div class="dark:text-dark-gray/70">{{ $post->excerpt }}</div>
                    <div>
                        <a class="text-pizza dark:text-pop font-bold" href="{{ route('post.show', $post->slug) }}">Read the full post</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout.main>
