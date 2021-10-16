<div>
    <div class="pb-20 px-4 sm:px-6 lg:pb-12 lg:px-8">
        <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
            <div class="mt-12 grid gap-16 pt-12 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
                @foreach($posts as $post)
                    <div>
                        <div>
                            @foreach($post->tags as $tag)
                                {{--TODO: Tags have there own page--}}
                                {{--<a href="#" class="inline-block">--}}
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                  {{ $tag->name }}
                                </span>
                                {{--</a>--}}
                            @endforeach
                        </div>
                        <x-link to="{{ route('post.show', $post->slug) }}" class="block mt-4">
                            <p class="text-xl font-semibold text-gray-900 dark:text-cool-gray-400">
                                {{ $post->title }}
                            </p>
                        </x-link>
                        <div class="mt-3">
                            <p class="text-base text-gray-500 dark:text-cool-gray-500">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">
                                    <span class="dark:text-cool-gray-400">{{ $post->author->name }}</span>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500 dark:text-cool-gray-500">
                                    <time datetime="2020-03-16">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('jS M, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
