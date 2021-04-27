<x-fos.layout :title="$post->title">
    @if(session('alert_status'))
        <x-alert type="success">{{ session()->get('alert_status') }}</x-alert>
    @endif

    <header>
        <h1>{{ $post->title }}</h1>
        <p><small>By <em>{{ $post->author->name }}</em> | Posted: <em>{{ $post->created_at->format('l, jS F, Y @ h:i') }}</em></small></p>
        @unless($post->published)
            <p>Draft</p>
        @endunless
    </header>

    <x-fos.content>
        <section>
            <picture>
                <img alt="{{ $post->title }}" src="{{ asset('post_headers/'.$post->post_image) }}" style="width: 16rem; height: 8rem">
            </picture>
        </section>

        <section>
            <p>Category: {{ $post->category->name }}</p>
        </section>

        <section>
            <p>Tags</p>
            <ul>
                @foreach($post->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </section>

        <article>
            {!! $post->content !!}
        </article>

        <section>
            <p>
                <x-link to="{{ route('posts.edit', $post) }}">Edit</x-link>
                <x-form.delete to="{{ route('posts.destroy', $post) }}">Archive</x-form.delete>
                <x-link to="{{ route('posts.index') }}">Go back</x-link>
            </p>
        </section>
    </x-fos.content>
</x-fos.layout>
