<x-fos.layout :title="$post->title">
    <x-fos.header>
        <h1>{{ $post->title }}</h1>
        <p><small>By <em>{{ $post->author->name }}</em> | Posted: <em>{{ $post->created_at->diffForHumans() }}</em></small></p>
    </x-fos.header>

    <x-fos.content>
        <article>
            {{ $post->content }}
        </article>

        <section>
            <p>
                <x-link to="{{ route('posts.edit', $post) }}">Edit</x-link>
                <x-delete to="{{ route('posts.destroy', $post) }}">Archive</x-delete>
            </p>
        </section>
    </x-fos.content>

    <x-fos.footer></x-fos.footer>
</x-fos.layout>
