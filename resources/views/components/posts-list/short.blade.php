@php use Carbon\Carbon; @endphp
<div>
    <div class="pb-10 sm:pb-20 px-4 sm:px-6 lg:pb-12 lg:px-8">
        <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
            <div class="sm:mt-8 grid gap-16 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
                @forelse($posts as $post)
                    <div class="sm:space-y-6">
                        <div>
                            @foreach ($post->tags as $tag)
                                <x-pill>{{ $tag->name }}</x-pill>
                            @endforeach
                        </div>
                        <x-link
                                class="block mt-4"
                                to="{{ route('post.show', $post->slug) }}"
                        >
                            <p class="text-2xl sm:text-xl font-semibold text-gray-900 dark:text-gray-400">
                                {{ $post->title }}
                            </p>
                        </x-link>
                        <div class="mt-3">
                            <p class="text-base text-gray-500 dark:text-dark-gray/70">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                        <div class="mt-6">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-400">
                                    <span>{{ $post->author->name }}</span>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500 dark:text-gray-400">
                                    <time datetime="2020-03-16">
                                        {{ Carbon::parse($post->created_at)->format('jS M, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center pb-8 lg:pb-16">
                        <p class="font-merriweather text-gray-500 text-2xl">Nothing yet... 😬</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
