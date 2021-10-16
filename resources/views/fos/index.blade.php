<x-fos.layout class="!pt-0">
    <x-auth.navigation/>
    <x-fos.content>
        <div class="mb-12">
            <x-link to="{{ route('fos.posts.index') }}">View Blog Posts</x-link>
            <x-link to="{{ route('fos.posts.create') }}">Add Post</x-link>

            <div class="flex">
                <div class="w-1/2"></div>
                <div class="w-1/2">
                    <h2 class="dark:text-cool-gray-400 font-merriweather text-center text-2xl mb-10">
                        All Blog Posts
                    </h2>
                </div>
            </div>
            <div class="flex divide-x dark:divide-cool-gray-700">
                <div class="w-1/2 px-3">derp</div>
                <div class="w-1/2 px-12">
                    <livewire:fos.blog-posts-list/>
                </div>
            </div>
        </div>
    </x-fos.content>
</x-fos.layout>
