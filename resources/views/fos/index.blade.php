<x-fos.layout>
    <x-auth.navigation/>
    <x-fos.content>
        <x-link to="{{ route('posts.index') }}">View Blog Posts</x-link>
        <p>
            <x-link to="{{ route('posts.create') }}">Add Post</x-link>
        </p>
                    <livewire:fos.blog-posts-list/>
    </x-fos.content>
</x-fos.layout>
