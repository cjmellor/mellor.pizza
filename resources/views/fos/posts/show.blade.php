<x-fos.layout :title="$post->title">
    <header>
        <h1>{{ $post->title }}</h1>
        <p><small>By <em>{{ $post->author->name }}</em> | Posted: <em>{{ $post->created_at->format('l, jS F, Y @ h:i') }}</em></small></p>
    </header>

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
</x-fos.layout>
