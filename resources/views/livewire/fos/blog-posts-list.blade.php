<div class="space-y-6">
    <div class="flow-root">
        <ul class="-my-5 divide-y dark:divide-cool-gray-700" role="list">
            @foreach($posts as $post)
                <li class="py-5">
                    <div class="relative">
                        <h3 class="text-xl mb-4 font-merriweather font-semibold text-gray-800 dark:text-cool-gray-400">
                            <x-link class="focus:outline-none" title="{{ $post->title }}" :to="route('fos.posts.edit', $post->id)">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $post->title }}
                            </x-link>
                        </h3>
                        <div class="text-md text-gray-900 dark:text-gray-400 line-clamp-2">
                            {!! $post->content !!}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{ $posts->links() }}

    <div class="mt-12">
        @if($viewingAll)
            <a class="flex justify-center button-pizza" wire:click="viewLessPosts">
                {{ $viewingAll ? 'View less' : 'View more' }}
            </a>
        @endif
    </div>
</div>
